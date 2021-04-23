const inputs = document.querySelectorAll('input')
const form = document.querySelector('form')
const qtdRodas = document.getElementById('veiculo_qtdRodas')

function InvalidInputException(input, message){
  this.message = message
  input.style.borderColor = 'red'
  input.value = ''
  input.focus()
  return false
}

form.addEventListener('submit', event => {
  try{
  event.returnValue = validateForm()
  } catch (error) {
    alert(error.message)
    event.returnValue = false
  }
})

function validateForm() {
  if (qtdRodas.value < 0) {
    throw new InvalidInputException(qtdRodas, 'Numero de rodas inválido.')
  }

  return true
}

inputs.forEach( input => {
  input.addEventListener('change', () => {
    input.style.borderColor = 'black'
  })
})
