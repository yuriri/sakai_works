// ABOUTまでスクロールしたらヘッダーを表示させる
function hdrShow() {

    const hdr = document.getElementById('js-hdr');
    const hdrHeight = hdr.offsetHeight;
    let scrlY = window.pageYOffset;
    const about = document.getElementById('js-about');
    const aboutRect = about.getBoundingClientRect();
    const aboutTop = aboutRect.top + scrlY;  
    const showClass = 'js-show';

    if( scrlY >= aboutTop) {
        hdr.classList.add(showClass);
    } else {
        hdr.classList.remove(showClass);
    }

    if( scrlY >= aboutTop - hdrHeight ) {
        about.classList.add(showClass);
    }
};

// WORKSまでスクロールしたらヘッダーを小さくする
function hdrChange() {

    const hdr = document.getElementById('js-hdr');
    const hdrHeight = hdr.offsetHeight;
    let scrlY = window.pageYOffset;
    const works = document.getElementById('js-works');
    const worksRect = works.getBoundingClientRect();
    const worksTop = worksRect.top + scrlY;    
    const changeClass = 'js-change';
    const showClass = 'js-show';

    if( scrlY >= worksTop ) {
        hdr.classList.add(changeClass);
    } else {
        hdr.classList.remove(changeClass);
    }

    if( scrlY >= worksTop - hdrHeight * 2 ) {
        works.classList.add(showClass);
    }

};

//---------------------------
// スマホでMENUボタンを表示
//---------------------------

// ヘッダーのMENUを押すとメニューを開く
function toggleMenu() {
    const menuElm = document.getElementById('js-hdr_nav');
    const showClass = 'js-show';
    menuElm.classList.toggle(showClass);
};
// ボタンを切り替える
function menuBtnMove() {
    menuBtn.classList.toggle('js-open');
    let menuFlag = menuBtn.getAttribute('aria-expanded');
    const labelOpen = 'メニューを開く';
    const labelClose = 'メニューを閉じる';
    
    if( menuFlag === 'true') {
        menuBtn.setAttribute('aria-expanded', 'false');
        menuBtn.setAttribute('aria-label', labelOpen);
    } else {
        menuBtn.setAttribute('aria-expanded', 'true');
        menuBtn.setAttribute('aria-label', labelClose);
    }
}
// トップページメニューページ内リンククリックでメニューを閉じる
function menuClickClose() {
    const menuKey = document.querySelectorAll('.l-hdr_nav_list li');
    const menuElm = document.getElementById('js-hdr_nav');

    menuKey.forEach(function(value) {

        console.log(value);
        value.addEventListener('click', (e) => {
            toggleMenu();
            menuBtnMove();
        });
    })

};

const menuBtn = document.getElementById('js-hdr-btn');

if(menuBtn) {
    // MENUボタンがある時に発火
    menuClickClose();
    // クリックで発火
    menuBtn.addEventListener('click', (e) => {
        toggleMenu();
        menuBtnMove();
    });    
}

// historyのアニメーション
function historyPop() {

    let scrlY = window.pageYOffset;
    const historyItem = document.getElementsByClassName('l-history_timeline_list_item');
    const hdrHeight = document.getElementById('js-hdr').offsetHeight;
    const changeClass = 'js-pop';

    Array.prototype.forEach.call(historyItem, function(item) {

        const itemRect = item.getBoundingClientRect();
        const itemTop = itemRect.top + scrlY;

        if( scrlY >= itemTop - hdrHeight * 5 ) {
            item.classList.add(changeClass);
        };
    });
};

//---------------------------
// worksのアニメーション
//---------------------------

// - トップページ
function worksPop() {

    let scrlY = window.pageYOffset;
    const worksArea = document.getElementById('js-works');
    const worksItem = document.getElementsByClassName('l-works_list_item');
    const hdrHeight = document.getElementById('js-hdr').offsetHeight;
    const changeClass = 'js-pop';    

    Array.prototype.forEach.call(worksItem, function(item, index) {
        const itemRect = worksArea.getBoundingClientRect();
        const itemTop = itemRect.top + scrlY;
        
        if( scrlY >= itemTop - hdrHeight * 5) {
                setTimeout(() => {
                item.classList.add(changeClass);
            }, 500 * index);                
        };
    });

};

// - 作品個別ページ
function worksPopPage() {

    let scrlY = window.pageYOffset;
    const pageWorksWrap = document.getElementsByClassName('l-works_post_wrap');
    const worksItem = document.getElementsByClassName('l-works_list_item');
    const hdrHeight = document.getElementById('js-hdr').offsetHeight;
    const changeClass = 'js-pop';  

    Array.prototype.forEach.call(worksItem, function(item, index) {
        const itemRect = pageWorksWrap[0].getBoundingClientRect();
        const itemTop = itemRect.top + scrlY;
        
        if( scrlY >= itemTop - hdrHeight * 5) {
                setTimeout(() => {
                item.classList.add(changeClass);
            }, 500 * index);                
        };
    });
}

//---------------------------
// skillsのアニメーション
//---------------------------

const skillItem = document.getElementsByClassName('l-skills_list_item_icon');
console.log('skillItem = ' + skillItem);
const mouseClass = 'js-skill-mouse';
const touchClass = 'js-skill-touch';

Array.prototype.forEach.call(skillItem, function(item) {
    item.addEventListener('touchstart', (e) => {
        console.log('touchstartです');
        const target = e.currentTarget;
        target.classList.toggle(touchClass);
    });    
    item.addEventListener('mouseover', (e) => {
        console.log('mouseoverした');
        let target = e.currentTarget;
        target.classList.add(mouseClass);
    });
    item.addEventListener('mouseleave', (e) => {
        console.log('mouseleaveした');
        let target = e.currentTarget;
        target.classList.remove(mouseClass);
    });    

    // item.addEventListener('touchend', (e) => {
    //     console.log('touchendです❤️');
    //     let target = e.currentTarget;
    //     target.classList.remove(touchClass);
    // });    
});

//---------------------------
// スクロールで発火
//---------------------------

addEventListener( "scroll", function () {

    const about = document.getElementById('js-about');
    const works = document.getElementById('js-works');
    const history = document.getElementById('scr-history');
    const pageWorksWrap = document.getElementsByClassName('l-works_post_wrap');

    if(about) {
        hdrShow(); // ヘッダー表示
    };
    if(works) {
        hdrChange(); // ヘッダー変化
        worksPop(); // 作品トップページポップ表示
    };
    if(history) {
        historyPop(); // historyポップ表示
    };
    if(pageWorksWrap.length !== 0) {
        worksPopPage(); // 作品詳細ページポップ表示
    }    

});