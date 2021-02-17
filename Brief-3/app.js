// burger menu 
const menuToggle = document.querySelector('.toggle');
const showcase = document.querySelector('.showcase');

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('active');
  showcase.classList.toggle('active');
})

// window.onclick = function(event) {
//   if(event.target === showcase ) {
//     showcase.classList.remove("active")
//   }
// }