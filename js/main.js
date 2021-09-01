'use strict'
// Open Toggle Function
document.querySelector('.mobile-toggle').addEventListener('click', function(){
  document.querySelector('aside').classList.add('show-nav')
  document.querySelector('aside').classList.remove('hide-nav')
})

// Close Toggle Function
document.querySelector('.close-toggle').addEventListener('click', function(){
  document.querySelector('aside').classList.add('hide-nav')
})



