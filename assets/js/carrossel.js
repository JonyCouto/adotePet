function movimentaCarrosel(i, tamanhoSlide, slide){
    i++
    i > tamanhoSlide - 1 ? i = 0 : i = i
    slide.style.transform = `translateX(${-i*100}%)`
    setTimeout(() => {
        movimentaCarrosel(i, tamanhoSlide, slide)
    }, 6000)
}
function carrosel(){
    const slide = document.querySelector('.container')
    const tamanhoSlide = Array.from(document.querySelectorAll('.divImgSlide')).length
    const i = 0
    movimentaCarrosel(i, tamanhoSlide, slide)
}
carrosel()