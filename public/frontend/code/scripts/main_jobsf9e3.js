{
    class Details {
        constructor() {
            this.DOM = {};

            const detailsTmpl = `
            <div class="details__bg details__bg--up"></div>
            <div class="details__bg details__bg--down"></div>
            <h2 class="details__title"></h2>
            <div class="underline_title_modal"></div>
            <div class="circle_companisto target">
                <img src="graphics/layout/logo_modal2.png" />
            </div>
            <div class="row opacity1" style='margin:0px !important;'>
            <img src="graphics/layout/small_logo.png" class="small_logo" style="margin-top:20px;float:left;margin-right:20px;" />
            <div class="location1" style="margin-top:20px;"><i class="fa fa-map-marker color_map_point"></i> Berlin, DE   <i class="fa fa-clock-o color_map_point"></i> Full Time</div>
            </div>
            <div class="details__description"></div>
            <button id="close_effect" class="details__close"><span class='close_job_list' aria-hidden="true">×</span></button>
            `;

            this.DOM.details = document.createElement('div');
            this.DOM.details.className = 'details';
            this.DOM.details.innerHTML = detailsTmpl;
            DOM.content.appendChild(this.DOM.details);
            this.init();
        }

        init() {

            this.DOM.bgUp = this.DOM.details.querySelector('.details__bg--up');
            this.DOM.bgDown = this.DOM.details.querySelector('.details__bg--down');
            this.DOM.title = this.DOM.details.querySelector('.details__title');
            this.DOM.description = this.DOM.details.querySelector('.details__description');
            this.DOM.close = this.DOM.details.querySelector('.details__close');
            this.DOM.underline_title_modal = this.DOM.details.querySelector('.underline_title_modal');
            this.DOM.circle_companisto = this.DOM.details.querySelector('.circle_companisto');
            this.DOM.job_description = this.DOM.details.querySelector('.details__description');
            this.DOM.small_logo = this.DOM.details.querySelector('.small_logo');
            this.DOM.opacity1 = this.DOM.details.querySelector('.opacity1');


            this.initEvents();
        }
        initEvents() {
            this.DOM.close.addEventListener('click', () => this.isZoomed ? this.zoomOut() : this.close());
        }
        fill(info) {
            this.DOM.title.innerHTML = info.title;
            this.DOM.description.innerHTML = info.description;
        }
        getProductDetailsRect() {
            return {
                productBgRect: this.DOM.productBg.getBoundingClientRect(),
                detailsBgRect: this.DOM.bgDown.getBoundingClientRect(),
            };
        }
        open(data) {
            if ( this.isAnimating ) return false;
            this.isAnimating = true;

            this.DOM.details.classList.add('details--open');    
            this.DOM.productBg = data.productBg;
            this.DOM.productBg.style.opacity = 0;
            this.DOM.details.style.overflowY = 'scroll';

            document.getElementsByClassName("newLayout")[0].style.overflowY = "hidden";

            const rect = this.getProductDetailsRect();

            this.DOM.bgDown.style.transform = `translateX(${rect.productBgRect.left-rect.detailsBgRect.left}px) translateY(${rect.productBgRect.top-rect.detailsBgRect.top}px) scaleX(${rect.productBgRect.width/rect.detailsBgRect.width}) scaleY(${rect.productBgRect.height/rect.detailsBgRect.height})`;
            this.DOM.bgDown.style.opacity = 1;

            anime({
                targets: this.DOM.bgUp,
                duration: 500,
                easing: 'easeInSine',
                opacity: 1
            });
            
            anime({
                targets: [this.DOM.bgDown],
                duration: (target, index) => index ? 800 : 400,
                scaleX: 1,
                scaleY: 1,
                complete: () => this.isAnimating = false,
                delay: 400,
            });
            anime({
                targets: [this.DOM.title],
                duration: 500,
                easing: 'easeOutExpo',
                delay: (target, index) => {
                    return index*60;
                },
                translateY: (target, index, total) => {
                    return index !== total - 1 ? [50,0] : 0;
                },
                scale:  (target, index, total) => {
                    return index === total - 1 ? [0,1] : 1;
                },
                opacity: 1,
                delay: 200,
            });

            anime({
                targets: [this.DOM.description],
                duration: 500,
                easing: 'easeOutExpo',
                delay: (target, index) => {
                    return index*60;
                },
                translateY: (target, index, total) => {
                    return index !== total - 1 ? [50,0] : 0;
                },
                // scale:  (target, index, total) => {
                //     return index === total - 1 ? [0,1] : 1;
                // },
                opacity: 1,
                delay: 700,
            }); 

            anime({
                targets: [this.DOM.circle_companisto, this.DOM.underline_title_modal, this.DOM.opacity1, this.DOM.small_logo],
                duration: 500,
                easing: 'easeOutExpo',
                delay: (target, index) => {
                    return index*60;
                },
                translateY: (target, index, total) => {
                    return index !== total - 1 ? [50,0] : 0;
                },
                // scale:  (target, index, total) => {
                //     return index === total - 1 ? [0,1] : 1;
                // },
                opacity: 1,
                delay: 500,
            });           

            anime({
                targets: this.DOM.close,
                duration: 800,
                easing: 'easeOutSine',
                translateY: ['100%',0],
                opacity: 1
            });

            anime({
                targets: DOM.hamburger,
                duration: 500,
                easing: 'easeOutSine',
                translateY: [0,'-100%']
            });
        }
        close() {
            if ( this.isAnimating ) return false;
            this.isAnimating = true;
            this.DOM.underline_title_modal.style.opacity = 0;
            this.DOM.circle_companisto.style.opacity = 0;
            this.DOM.small_logo.style.opacity = 0;
            this.DOM.opacity1.style.opacity = 0;
            this.DOM.job_description.style.opacity = 0;
            this.DOM.details.classList.remove('details--open');
            this.DOM.details.style.overflowY = 'hidden';
            document.getElementsByClassName("newLayout")[0].style.overflowY = "inherit";

            anime({
                targets: DOM.hamburger,
                duration: 250,
                easing: 'easeOutSine',
                translateY: 0
            });

            anime({
                targets: this.DOM.close,
                duration: 250,
                easing: 'easeOutSine',
                translateY: '100%',
                opacity: 0
            });

            anime({
                targets: this.DOM.bgUp,
                duration: 100,
                easing: 'linear',
                opacity: 0
            });

            anime({
                targets: [this.DOM.title, this.DOM.description],
                duration: 20,
                easing: 'linear',
                opacity: 0
            });


            const rect = this.getProductDetailsRect();
            anime({
                targets: [this.DOM.bgDown],
                duration: 250,
                easing: 'easeOutSine',
                translateX: (target, index) => {
                    return index ? rect.productImgRect.left-rect.detailsImgRect.left : rect.productBgRect.left-rect.detailsBgRect.left;
                },
                translateY: (target, index) => {
                    return index ? rect.productImgRect.top-rect.detailsImgRect.top : rect.productBgRect.top-rect.detailsBgRect.top;
                },
                scaleX: (target, index) => {
                    return index ? rect.productImgRect.width/rect.detailsImgRect.width : rect.productBgRect.width/rect.detailsBgRect.width;
                },
                scaleY: (target, index) => {
                    return index ? rect.productImgRect.height/rect.detailsImgRect.height : rect.productBgRect.height/rect.detailsBgRect.height;
                },
                complete: () => {
                    this.DOM.bgDown.style.opacity = 0;
                    this.DOM.bgDown.style.transform = 'none';
                    this.DOM.productBg.style.opacity = 1;
                    this.DOM.job_description.style.display = 'block';
                    this.DOM.job_description.style.opacity = '0';
                    this.isAnimating = false;
                }
            });
        }
        zoomIn() {
            this.isZoomed = true;

            anime({
                targets: [this.DOM.title, this.DOM.description],
                duration: 100,
                easing: 'easeOutSine',
                translateY: (target, index, total) => {
                    return index !== total - 1 ? [0, index === 0 || index === 1 ? -50 : 50] : 0;
                },
                scale:  (target, index, total) => {
                    return index === total - 1 ? [1,0] : 1;
                },
                opacity: 0
            });

            const imgrect = this.DOM.img.getBoundingClientRect();
            const win = {w: window.innerWidth, h: window.innerHeight};
            
            const imgAnimeOpts = {
                targets: this.DOM.img,
                duration: 250,
                easing: 'easeOutCubic',
                translateX: win.w/2 - (imgrect.left+imgrect.width/2),
                translateY: win.h/2 - (imgrect.top+imgrect.height/2)
            };

            if ( win.w > 0.8*win.h ) {
                this.DOM.img.style.transformOrigin = '50% 50%';
                Object.assign(imgAnimeOpts, {
                    scaleX: 0.95*win.w/parseInt(0.8*win.h),
                    scaleY: 0.95*win.w/parseInt(0.8*win.h),
                    rotate: 90
                });
            }
            anime(imgAnimeOpts);

            anime({
                targets: this.DOM.close,
                duration: 250,
                easing: 'easeInOutCubic',
                scale: 1.8,
                rotate: 180
            });
        }
        zoomOut() {
	    if ( this.isAnimating ) return false;
            this.isAnimating = true;
            this.isZoomed = false;

            anime({
                targets: [this.DOM.title, this.DOM.description],
                duration: 250,
                easing: 'easeOutCubic',
                translateY: 0,
                scale: 1,
                opacity: 1
            });

            anime({
                targets: this.DOM.img,
                duration: 250,
                easing: 'easeOutCubic',
                translateX: 0,
                translateY: 0,
                scaleX: 1,
                scaleY: 1,
                rotate: 0,
                complete: () => {
                    this.DOM.img.style.transformOrigin = '0 0';
                    this.isAnimating = false;
                }
            });

            anime({
                targets: this.DOM.close,
                duration: 250,
                easing: 'easeInOutCubic',
                scale: 1,
                rotate: 0
            });
        }
    };

    class Item {

		constructor(el) {
			this.DOM = {};
            this.DOM.el = el;
            this.DOM.product = this.DOM.el.querySelector('.product');
            this.DOM.productBg = this.DOM.product.querySelector('.product__bg');
            
            this.info = {
                title: this.DOM.product.querySelector('.product__title').innerHTML,
                description: this.DOM.product.querySelector('.description').innerHTML,
            };

			this.initEvents();
		}
        initEvents() {
            this.DOM.product.addEventListener('click', () => this.open());
        }
        open() {
            DOM.details.fill(this.info);
            DOM.details.open({
                productBg: this.DOM.productBg,
            });
        }
    };




    const DOM = {};
    DOM.grid = document.querySelector('.grid');
    DOM.content = DOM.grid.parentNode;
    DOM.hamburger = document.querySelector('.dummy-menu');
    DOM.gridItems = Array.from(DOM.grid.querySelectorAll('.grid__item'));
    let items = [];
    DOM.gridItems.forEach(item => items.push(new Item(item)));

    DOM.details = new Details();

    imagesLoaded(document.body, () => document.body.classList.remove('loading'));
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27);
        }
        if (isEscape) {
            document.getElementById("close_effect").click();
        }
    };
};
