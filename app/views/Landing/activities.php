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
    <div class="row" style="padding-left: 15px; padding-right: 15px; padding-bottom: 20px;">
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
    <div class="container" style="padding-top: 20px; height: 500px; background-color: #f3f3f3">
        <!-- Cards here -->
        <a href="#" class="card-container">
            <div class="gym-image-container">
                <img class="gym-image" src="<?php echo URLROOT; ?>/images/golds gym.png">
            </div>
            <div class="card-content">
                <p class="gym-name">Gold's Gym</p>
                <div class="line-separator"></div>
                <div class="gym-info-container">
                    <table style="width:100%;">
                        <tr>
                            <td class="card-info-col">
                                <img class="card-category-image" src="<?php echo URLROOT; ?>/images/weightlift.svg">
                                <small class="card-cateogry-text">Weightlifting</small>
                            </td>
                            <td>
                                <img class="card-category-image" src="<?php echo URLROOT; ?>/images/location-orange.svg">
                                <small class="card-cateogry-text">Venice Beach</small>
                            </td>
                        </tr>
                        <tr>
                            <td class="card-info-col">
                                <img class="card-category-image" src="<?php echo URLROOT; ?>/images/timer-orange.svg">
                                <small class="card-cateogry-text">x3 weekly</small>
                            </td>
                            <td>
                                <img class="card-category-image" src="<?php echo URLROOT; ?>/images/group-orange.svg">
                                <small class="card-cateogry-text">Unlimited</small>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="credits-container">
                <img class="credits-image" class="card-category-image" src="<?php echo URLROOT; ?>/images/credits.svg">
                <h5>25</h5>
            </div>
        </a>

    </div>
</div>

<style>
    .card-container {
        margin-left: 15px;
        margin-right: 15px;
        flex: 1;
        flex-direction: row;
        height: 100px;
        border-style: solid;
        border-width: 1;
        border-radius: 24px;
        border-color: #707070;
        align-items: center;
        display: flex;
        color: black;
        outline: none;
        background-color: white;
    }

    .card-container:focus {
        text-decoration: none;
        color: black;
    }

    .credits-container {
        margin-left: 5px;
    }

    .credits-image {
        height: 20px;
        width: 24px;
    }

    .card-info-col {
        width: 50%;
    }

    .card-category-text {
        font-size: 12px;
    }

    .card-category-image {
        height: 18px;
        width: 18px;
    }

    .gym-image-container {
        width: 20%;
        height: 80px;
        margin-left: 15px;
    }

    .gym-image {
        width: 100%;
        height: 100%;
    }

    .card-content {
        width: 60%;
        height: 80px;
        margin-left: 10px;
    }

    .gym-name {
        height: 10px;
        font-weight: bold;
    }

    .line-separator {
        height: 1px;
        width: 100%;
        background-color: #f3f3f3;
    }

    .gym-info-container {
        width: 100%;
    }






















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