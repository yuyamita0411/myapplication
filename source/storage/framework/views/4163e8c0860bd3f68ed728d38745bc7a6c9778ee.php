<?php $__env->startSection('content'); ?>
    <div class="articlewrapper col-12 m-auto p-3">
        <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
        <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">
            <article class="p-news-list__item js-inter fadeInLeft is-invasion">
                <a href="p-news-list__item js-inter fadeInLeft is-invasion">
                    <div class="w-100">
                        <p class="mb-0 font-weight-bold">
                            <?php if(!empty($Notification[0])): ?>
                            <?php echo e($Notification[0]->title); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </a>
            </article>
        </div>
        <div class="gridinside w-100 bg-white p-3">
            <img src="<?php echo e(secure_asset('asset/clipicon.png')); ?>" class="clipicon position-absolute">
            <div id="notificationarea"></div>

            <div class="d-inline-block w-100 mt-3">
                <div id="notificationpagenationarea" class="col-10 col-md-6 col-lg-4 d-flex m-auto">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script type="module">
    import {Ajax} from '../js/Ajax.js';
    import {PageNation} from '../js/Pagenation.js';
    import {commonloadMotion} from '../../js/modal.js';
    var PageNow = 1;
    const ajax = new Ajax();
    const pagination = new PageNation();

    window.addEventListener('load', () => {
        rebaseNotification(PageNow);
    });

    window.addEventListener('click', (e) => {
        if(e.target.className.match(/pagenationnum/)){
            PageNow = e.target.innerText;
            rebaseNotification(PageNow);
        }
    });

    window.addEventListener('input', (e) => {
        if(e.target.id.match(/PageNationInput/)){
            setTimeout(() => {
                if(e.target.value != ''){
                    PageNow = e.target.value;
                    rebaseNotification(PageNow);
                }
            }, 500);
        }
    });

    const rebaseNotification = (PageNow) => {
        commonloadMotion('notificationarea', "<?php echo e(secure_asset('asset/loadingicon.png')); ?>");
        ajax.method1(
            "<?php echo e(route('dashboard.notification')); ?>",
            'POST',
            {
                "PageNow":PageNow
            },
            (Res) => {
                console.log(Res);
                commonloadMotion('notificationarea', "<?php echo e(secure_asset('asset/loadingicon.png')); ?>");
                var innerhtml = '';
                document.getElementById('notificationarea').innerHTML = '';
                for(var key in Res){
                    if(Res[key].created_at || Res[key].title){
                        var tobj = new Date(Res[key].created_at);

                        console.log(tobj);
                        innerhtml += `
                        <article class="p-news-list__item js-inter fadeInLeft is-invasion mb-3 p-2">
                            <a href="${Res[key].notificationlink}">
                                <div class="p-news-list__item__data pb-2">
                                    <p class="p-news-list__item__data__date mb-0">${tobj.getFullYear()}-${tobj.getMonth()}-${tobj.getDate()}</p>
                                    <div class="p-news-list__item__data__line"></div>
                                    <p class="p-news-list__item__data__category mb-0">${Res[key].title}</p>
                                </div>
                            </a>
                        </article>
                        `;
                    }
                }
                document.getElementById('notificationarea').innerHTML = innerhtml;
                document.getElementById('notificationpagenationarea').innerHTML = pagination.MakePagenation(Res['PageAmount'], PageNow);
            },
            (r1, r2) => {
                console.log("fail!!");
            }
        );
    }
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gware/resources/views/layout/dashboard.blade.php ENDPATH**/ ?>