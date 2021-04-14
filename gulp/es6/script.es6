
// ABOUTまでスクロールしたらヘッダーを表示させる
function hdrShow() {

    const hdr = document.getElementById('js-hdr');
    let scrlY = window.pageYOffset;
    const about = document.getElementById('js-about');
    const aboutRect = about.getBoundingClientRect();
    const aboutTop = aboutRect.top + scrlY;  
    const showClass = 'js-show';

    if( scrlY >= aboutTop ) {
        hdr.classList.add(showClass);
    } else {
        hdr.classList.remove(showClass);
    }

};

// WORKSまでスクロールしたらヘッダーを小さくする
function hdrChange() {

    const hdr = document.getElementById('js-hdr');
    let scrlY = window.pageYOffset;
    const works = document.getElementById('js-works');
    const worksRect = works.getBoundingClientRect();
    const worksTop = worksRect.top + scrlY;    
    const changeClass = 'js-change';

    if( scrlY >= worksTop ) {
        hdr.classList.add(changeClass);
    } else {
        hdr.classList.remove(changeClass);
    }

};

addEventListener( "scroll", function () {
    const about = document.getElementById('js-about');
    const works = document.getElementById('js-works');
    const history = document.getElementById('scr-history');

    if(about) {
        hdrShow();
    };
    if(works) {
        hdrChange();
    };
    if(history) {
        historyPop();
    };

});

// ヘッダーのMENUを押すとメニューを開く
function toggleMenu() {
    const menuElm = document.getElementById('js-hdr_nav');
    menuElm.classList.toggle('js-show');
};

const menuBtn = document.getElementById('js-hdr-btn');
if(menuBtn) {
    menuBtn.addEventListener('click', () => {
        toggleMenu();
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