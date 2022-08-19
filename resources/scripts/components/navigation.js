export const handleToggler = () => {
  const toggler = document.getElementById('primary-navigation-toggler');
  const menu = document.getElementById('primary-navigation');

  if (toggler && menu) {
    toggler.addEventListener('click', () => {
      toggler.classList.toggle('-active');
      menu.classList.toggle('-active');
    });
  }
};
