<?php require APPROOT . '/views/inc/header.php'; ?>
<!--HTML for homepage goes here, for CSS visit public folder-->
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<!--Activity page-->

<div class="container-fluid" style="background-color:#F2F2F2;">
    <div class="row justify-content-center">
        <div class="landing-image col-sm-12 col-lg-6 px-0">
            <img class="activities-responsive" src="<?php echo URLROOT; ?>/images/gym-workout-routines.jpg" alt="">
            <div class="text-overlay-5">
                <h3 class="land-text-6">All Activities</h3>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 20px;">
    <div class="row" style="padding-left: 15px; padding-right: 15px;">
        <div class="col-9">
            <div class="search-input">
                <span class="search-text-icon"><svg id="loupe" xmlns="http://www.w3.org/2000/svg" width="19.261" height="19.261" viewBox="0 0 19.261 19.261">
                        <g id="Group_86" data-name="Group 86">
                            <path id="Path_100" data-name="Path 100" d="M19.026,17.894l-5.477-5.477a7.639,7.639,0,1,0-1.135,1.135l5.477,5.477a.8.8,0,1,0,1.135-1.135Zm-11.4-4.248a6.019,6.019,0,1,1,6.019-6.019A6.025,6.025,0,0,1,7.624,13.646Z" transform="translate(0 -0.003)" fill="#001e4e" />
                        </g>
                    </svg></span>
                <input class="search-input-text" placeholder="Search for something">
            </div>
        </div>
        <div class="col-3">
            <button type="button" class="filter-btn"><span class="filter-btn-icon">
                    <svg id="filter-filled-tool-symbol" xmlns="http://www.w3.org/2000/svg" width="14.761" height="14.896" viewBox="0 0 14.761 14.896">
                        <path id="Path_103" data-name="Path 103" d="M10.016,7.039a.919.919,0,0,1,.242.622v6.774a.46.46,0,0,0,.783.328L12.93,12.6c.253-.3.392-.454.392-.754V7.663a.927.927,0,0,1,.242-.622l5.422-5.883A.69.69,0,0,0,18.48,0H5.1a.69.69,0,0,0-.507,1.157Z" transform="translate(-4.41)" />
                    </svg>
                </span>
                Filter
            </button>
        </div>
    </div>
    <div class="container" style="padding-top: 20px;">
        <!-- Cards here -->
        <div class="placeholder-card"></div>

    </div>
</div>

<style>
    .text-overlay-5 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .land-text-6 {
        font-size: 30px;
        font-weight: bold;
        color: #ef8830;
        text-shadow: 0.5px 0 0 #000, 0 -0.5px 0 #000, 0 0.5px 0 #000, -0.5px 0 0 #000;
    }

    .activities-responsive {
        width: 100%;
        filter: blur(4px);
    }

    .search-text-icon {
        margin-left: 5px;
        padding-bottom: 5px;
    }

    .search-input {
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 37px;
        border-radius: 12px;
        border-width: 1px;
        border-color: black;
        border-style: solid;
    }

    .search-input-text {
        height: 100%;
        width: 90%;
        background-color: transparent;
        border-style: none;
        outline: none;
    }

    .filter-btn {
        background-color: #ef8830;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 37px;
        font-size: 18px;
        color: black;
        border-radius: 12px;
        border-style: none;
        outline: none;
    }

    .filter-btn-icon {
        margin-bottom: 10px;
    }
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>