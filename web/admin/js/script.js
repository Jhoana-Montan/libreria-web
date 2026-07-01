/* =========================================================
   Librería Montan - Scripts UI
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  /* ---- Sidebar toggle ---- */
  const sidebar = document.querySelector('.sidebar');
  const main = document.querySelector('.main');
  const toggle = document.querySelector('.btn-toggle');
  if (toggle && sidebar) {
    toggle.addEventListener('click', () => {
      if (window.innerWidth <= 980) {
        sidebar.classList.toggle('open');
      } else {
        sidebar.classList.toggle('collapsed');
        main && main.classList.toggle('full');
      }
    });
  }

  /* ---- Buscador de tablas ---- */
  document.querySelectorAll('[data-search]').forEach(input => {
    const target = document.querySelector(input.dataset.search);
    if (!target) return;
    input.addEventListener('input', e => {
      const q = e.target.value.toLowerCase().trim();
      target.querySelectorAll('tbody tr').forEach(tr => {
        tr.style.display = tr.innerText.toLowerCase().includes(q) ? '' : 'none';
      });
    });
  });

  /* ---- Filtros select ---- */
  document.querySelectorAll('[data-filter]').forEach(sel => {
    const target = document.querySelector(sel.dataset.filter);
    if (!target) return;
    sel.addEventListener('change', e => {
      const v = e.target.value.toLowerCase();
      target.querySelectorAll('tbody tr').forEach(tr => {
        if (!v) { tr.style.display = ''; return; }
        tr.style.display = tr.innerText.toLowerCase().includes(v) ? '' : 'none';
      });
    });
  });

  /* ---- Confirmación eliminar ---- */
  document.querySelectorAll('[data-confirm]').forEach(btn => {
    btn.addEventListener('click', e => {
      if (!confirm(btn.dataset.confirm || '¿Está seguro?')) e.preventDefault();
    });
  });

  /* ---- Resumen de venta ---- */
  const selProd = document.getElementById('venta-producto');
  const inpCant = document.getElementById('venta-cantidad');
  if (selProd && inpCant) {
    const upd = () => {
      const opt = selProd.options[selProd.selectedIndex];
      const precio = parseFloat(opt?.dataset.precio || 0);
      const stock = parseInt(opt?.dataset.stock || 0);
      const cat = opt?.dataset.cat || '-';
      const cant = parseInt(inpCant.value || 0);
      const total = precio * cant;
      const set = (id, v) => { const el = document.getElementById(id); if (el) el.textContent = v; };
      set('s-nombre', opt?.value ? opt.text : '—');
      set('s-precio', '$' + precio.toFixed(2));
      set('s-cat', cat);
      set('s-stock', stock);
      set('s-cant', cant);
      set('s-total', '$' + total.toFixed(2));
    };
    selProd.addEventListener('change', upd);
    inpCant.addEventListener('input', upd);
    upd();
  }

  /* ---- Gráficos Dashboard ---- */
  if (typeof Chart !== 'undefined') {
    Chart.defaults.font.family = "'Inter', system-ui, sans-serif";
    Chart.defaults.color = '#7a8699';

    const elVentas = document.getElementById('chart-ventas');
    if (elVentas) {
      const ctx = elVentas.getContext('2d');
      const grad = ctx.createLinearGradient(0, 0, 0, 320);
      grad.addColorStop(0, 'rgba(47,111,209,.35)');
      grad.addColorStop(1, 'rgba(47,111,209,0)');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
          datasets: [{
            label: 'Ventas 2026',
            data: [1200,1800,1500,2200,2600,2400,3100,2900,3400,3700,3200,4100],
            borderColor: '#2454a6',
            backgroundColor: grad,
            tension: .4, fill: true, borderWidth: 3,
            pointBackgroundColor: '#2454a6', pointRadius: 4, pointHoverRadius: 6,
          },{
            label: 'Ventas 2025',
            data: [900,1100,1400,1300,1900,2000,2500,2300,2600,2900,2700,3200],
            borderColor: '#cdd4e0', borderDash:[6,6],
            backgroundColor:'transparent', tension:.4, borderWidth:2,
            pointRadius:0,
          }]
        },
        options: {
          responsive:true, maintainAspectRatio:false,
          plugins:{ legend:{position:'bottom', labels:{boxWidth:10, padding:18, usePointStyle:true}}},
          scales:{
            x:{grid:{display:false}},
            y:{grid:{color:'#eef1f6'}, ticks:{callback:v=>'$'+v}}
          }
        }
      });
    }

    const elInv = document.getElementById('chart-inventario');
    if (elInv) {
      new Chart(elInv, {
        type: 'doughnut',
        data: {
          labels: ['Novelas','Académicos','Infantil','Papelería','Otros'],
          datasets: [{
            data: [320,210,180,140,90],
            backgroundColor: ['#2454a6','#10b981','#f59e0b','#7c3aed','#ef4444'],
            borderWidth: 0, hoverOffset: 8,
          }]
        },
        options: {
          responsive:true, maintainAspectRatio:false, cutout:'68%',
          plugins:{ legend:{position:'bottom', labels:{boxWidth:10, padding:14, usePointStyle:true}}}
        }
      });
    }
  }

  /* ---- Toast simple ---- */
  window.toast = msg => {
    const t = document.createElement('div');
    t.textContent = msg;
    t.style.cssText = 'position:fixed;bottom:24px;right:24px;background:#0f1d3a;color:#fff;padding:12px 18px;border-radius:10px;box-shadow:0 10px 30px rgba(0,0,0,.2);z-index:999;font-size:13px;animation:fadeUp .3s';
    document.body.appendChild(t);
    setTimeout(()=>t.remove(), 2500);
  };

  /* ---- Submit demo ---- */
  document.querySelectorAll('form[data-demo]').forEach(f => {
    f.addEventListener('submit', e => {
      e.preventDefault();
      window.toast(f.dataset.demo || 'Acción realizada con éxito');
    });
  });
});
