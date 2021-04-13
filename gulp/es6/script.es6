
// ABOUTまでスクロールしたらヘッダーを表示させる
function hdrShow() {
    const hdr = document.getElementById('js-hdr');
    console.log('hdr = ' + hdr);
    let scrlY = window.pageYOffset;

    const about = document.getElementById('js-about');
    const aboutRect = about.getBoundingClientRect();
    const aboutTop = aboutRect.top;    

    console.log('aboutTop = ' + aboutTop);    
    console.log('start hdrShow');
    console.log('scrlY = ' + scrlY);

    function firstShow(data) {
        return new Promise(function() {
            if( scrlY >= aboutTop + data * 20) {
                hdr.classList.add("js-show");
            }
        })
    };

    function secondRemove(data) {
        console.log('Start secondRemove');
        const about = document.getElementById('js-about');
        const aboutRect = about.getBoundingClientRect();
        const aboutTop_remove = aboutRect.top;    
        let scrlY_remove = window.pageYOffset;
        console.log('scrlY_remove = ' + scrlY_remove + data);

        if(scrlY_remove == 0) {
            if(hdr.classList.contains('js-show')) {
                hdr.classList.remove("js-show");
            }
        }
    }

    function hdr_paromise() {
        firstShow(1).then(function(data) {
            console.log('OHHHHhhhhhh!!!' + data);
            secondRemove(data);
        })
    }
    
    hdr_paromise();
};

// function hdrChange() {
//     const works = document.getElementById('js-works');
//     const worksRect = works.getBoundingClientRect();
//     let worksTop = worksRect.top + window.pageYOffset;
//     if(scrlY >= worksTop + 20) {
//         hdr.classList.add('js-change');
//     }
// };

addEventListener( "scroll", function () {

    hdrShow();
    // hdrChange();
});