<button class="toggle-btn" aria-label="Toggle sidebar">☰</button>

<div class="sidebar" role="navigation" aria-label="Hoofdmenu">
  <header>Dashboard</header>
  <nav>
    <a href="/dashboard" class="active">Home</a>
    <a href="/dashboard/pages">Pagina's</a>
    <a href="/dashboard/settings">Instellingen</a>
    <a href="/dashboard/profile">Profiel</a>
  </nav>
</div>


<div class="overlay"></div>

<style>
    
</style>


 <script>
  const toggleBtn = document.querySelector('.toggle-btn');
  const sidebar = document.querySelector('.sidebar');
  const main = document.querySelector('main');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    main.classList.toggle('shift');
  });
</script>


