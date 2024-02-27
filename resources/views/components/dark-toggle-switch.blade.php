<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 48px; /* Adjusted width */
        height: 28px; /* Adjusted height */
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 28px; /* Adjusted border radius */
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px; /* Adjusted height */
        width: 22px; /* Adjusted width */
        left: 3px; /* Adjusted left position */
        bottom: 3px; /* Adjusted bottom position */
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(20px); /* Adjusted translation */
        -ms-transform: translateX(20px); /* Adjusted translation */
        transform: translateX(20px); /* Adjusted translation */
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<label class="switch">
    <input type="checkbox" id="darkModeToggle" onchange="{{ $onchange }}()">
    <span class="slider round"></span>
</label>
