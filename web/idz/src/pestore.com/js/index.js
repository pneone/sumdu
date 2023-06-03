document.addEventListener('DOMContentLoaded', ()=>{
    window.setTimeout(function () {
        document.querySelector('.preloader-box').style.display = 'none';
    }, 700);


    const openBtn = document.querySelector('#open'),
    closeBtn = document.querySelector('#close')
    navbarLinks = document.querySelector('.mobile-links');

    openBtn.classList.add('show');

    function openNavbarLinks(){
        openBtn.classList.toggle('show');
        closeBtn.classList.toggle('show');
        navbarLinks.classList.toggle('links-open');
    }

    openBtn.addEventListener('click', () => {
    openNavbarLinks();
    });

    closeBtn.addEventListener('click', () => {
    openNavbarLinks();
    });

    //Swiper
    let swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        autoplay: {
            delay: 7000,
        },
        loop: true,
    });

    let recommendationsSlider = new Swiper(".recommendations-slider", {
        slidesPerView: 1,   

        navigation: {
            nextEl: ".recommendations-next",
            prevEl: ".recommendations-prev",
        },
        breakpoints: {
        
            576: {
                slidesPerView: 2,
            },
            792: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
            1400: {
                slidesPerView: 5,
            },
        },
    });

    let wow = new WOW(
    {
        mobile:       false,
    }
    );
    wow.init();



    const btnMore = document.querySelector('.btn-more');

    
    if(btnMore){
        btnMore.addEventListener('click', () =>{
            btnMore.parentNode.classList.toggle('open');
    
            if(btnMore.parentNode.classList.contains('open')){
                btnMore.innerHTML = 'Згорнути';
            }else{
                btnMore.innerHTML = 'Розгорнути';
            }
        });
    }

    const btnEdit = document.querySelector('.table').querySelectorAll('.btn-edit');

    function edit(btn){
        const row = btn.closest('.product-row');
        const inputs = row.querySelectorAll('input, textarea');
        inputs.forEach(item =>{
            item.disabled= false;
        });
        btn.classList.add('btn-active');
        
    }

    btnEdit.forEach(btn =>{
        btn.addEventListener('click', () => {
            edit(btn);
        })
    });
    

    

})



function pow(x, n){
    if(n === 1){
        return x;
    }else{
        return x * pow(x, n - 1);
    }
}

console.log(pow(2, 3));


// Admin Tabs

const globalTab = document.querySelector('#global-tab'),
      productsTab = document.querySelector('#products-tab'),
      addTab = document.querySelector('#add-tab'),
      globalTabContent = document.querySelector('#global-tab-content'),
      productsTabContent = document.querySelector('#products-tab-content'),
      addTabContent = document.querySelector('#add-tab-content');

globalTab.addEventListener('click', ()=>{
    productsTab.classList.remove('active-tab');
    addTab.classList.remove('active-tab');
    globalTab.classList.add('active-tab');
    globalTabContent.classList.add('active-tab-content');
    productsTabContent.classList.remove('active-tab-content');
    addTabContent.classList.remove('active-tab-content');
});
productsTab.addEventListener('click', ()=>{
    productsTab.classList.add('active-tab');
    addTab.classList.remove('active-tab');
    globalTab.classList.remove('active-tab');
    globalTabContent.classList.remove('active-tab-content');
    productsTabContent.classList.add('active-tab-content');
    addTabContent.classList.remove('active-tab-content');
});
addTab.addEventListener('click', ()=>{
    productsTab.classList.remove('active-tab');
    addTab.classList.add('active-tab');
    globalTab.classList.remove('active-tab');
    globalTabContent.classList.remove('active-tab-content');
    productsTabContent.classList.remove('active-tab-content');
    addTabContent.classList.add('active-tab-content');
});



