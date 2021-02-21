const displayModal = () => {

    const user = {
      name: document.querySelector('#fname').value , 
    
      email: document.querySelector('#email').value
  
    }
  
    name = document.querySelector('#nameDisp')
   
    email = document.querySelector('#emailDisp')
  
    name.textContent = user.name
   
  
    document.querySelector('#modal').style.display = 'flex'
    document.querySelector('#nameDisp').textContent = user.name 
    
    document.querySelector('#emailDisp').textContent = user.email
  }
  
  document.querySelector('#close').addEventListener('click', () => {
    document.querySelector('#modal').style.display = 'none'
  })
  
  
  