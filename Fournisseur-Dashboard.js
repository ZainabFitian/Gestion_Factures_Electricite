// Common JS
document.querySelectorAll('.watch-control, .controls a').forEach(control => {
    control.addEventListener('click', e => {
        e.preventDefault()
    })
})
// End of Common JS

const watchBands = document.querySelector('.watch-bands')


const watchRightControl = document.querySelector('.watch-right-control')
const watchLeftControl = document.querySelector('.watch-left-control')

let axisY = 0
let axisX = 0

const hideControl = () => {

    if(axisX === 280) {
        watchRightControl.classList.add('hideControl')
    } else {
        watchRightControl.classList.remove('hideControl')
    }

    if(axisX === -280) {
        watchLeftControl.classList.add('hideControl')
    } else {
        watchLeftControl.classList.remove('hideControl')
    }
}

watchRightControl.addEventListener('click', () => {
    watchBands.style.marginRight = `${axisX += 70}rem`
    hideControl()
})

watchLeftControl.addEventListener('click', () => {
    watchBands.style.marginRight = `${axisX -= 70}rem`
    hideControl()
})
// End of Section 4