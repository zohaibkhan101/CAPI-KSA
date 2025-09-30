<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vCard</title>
<style>
    /* Reset margins and set full height for HTML and Body */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Prevent horizontal scroll */
    }

    /* General styling for the body */
    body {
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        font-family: Arial, sans-serif;
    }

    /* --- Fullscreen vCard Container (main) --- */
    main.vcard-container {
        width: 100%;
        max-width: 100%;
        min-height: 100vh;
        background-color: white;
        padding: 0; /* Remove main padding */
        position: relative;
        display: flex;
        flex-direction: column;
    }

    /* --- Header Section (Matching the image design) --- */
    .vcard-header {
        background-color: #AA6539; /* Dark orange/brown color */
        color: white;
        padding: 40px 20px 20px; 
        text-align: center;
        /* Updated to use dynamic card data */
    }

    .vcard-header h1 {
        margin: 0 0 5px 0;
        font-size: 1.8em; 
        font-weight: normal;
    }

    .vcard-header p.position {
        margin: 0;
        font-size: 1em;
        opacity: 0.8;
    }

    .vcard-header p.company {
        margin: 5px 0 0;
        font-size: 0.9em;
        font-weight: bold;
        opacity: 0.9;
    }


    /* --- Action Buttons Section (Top row: CALL, EMAIL, DIRECTIONS) --- */
    .vcard-actions {
        display: flex;
        justify-content: space-around;
        background-color: #AA6539; 
        color: white;
    }

    .action-item {
        flex-grow: 1;
        text-align: center;
        padding: 18px 0;
        cursor: pointer;
        transition: background-color 0.2s;
        border-left: 1px solid rgba(255, 255, 255, 0.2); 
        text-decoration: none; /* For the <a> tags */
        color: inherit;
    }

    .action-item:first-child {
        border-left: none;
    }

    .action-item:hover {
        background-color: #8C552F; 
    }

    .action-item .icon {
        display: block;
        font-size: 1.4em;
        margin-bottom: 5px;
    }

    .action-item .label {
        font-size: 0.7em;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: bold;
    }

    /* --- Details List Section --- */
    .vcard-details {
        padding: 10px 0;
        flex-grow: 1; /* Allows the detail section to fill the remaining height */
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        padding: 18px 20px;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        color: inherit;
    }

    .detail-item:hover {
        background-color: #fafafa;
    }

    .detail-icon {
        font-size: 1.4em;
        color: #666;
        margin-right: 15px;
        padding-top: 2px; 
    }

    .detail-text {
        flex-grow: 1;
    }

    .detail-text .main-info {
        margin: 0;
        font-size: 1.1em;
        color: #333;
        line-height: 1.4;
        font-weight: bold;
    }

    .detail-text .sub-info {
        margin: 0;
        font-size: 0.9em;
        color: #888;
    }

    /* Floating Action Button (FAB) - Updated to your 'Save Contact' button */
    .fab {
        position: fixed; 
        bottom: 25px;
        right: 25px;
        width: 60px; 
        height: 60px;
        border-radius: 50%;
        background-color: #E38D4F; 
        color: white;
        border: none;
        font-size: 2.5em;
        line-height: 60px;
        text-align: center;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.2s;
        text-decoration: none; /* Important for the <a> tag */
    }

    .fab:hover {
        background-color: #d17539;
    }
</style>

<main class="vcard-container">
    <div class="vcard-header">
        <h1>{{ $card->name }}</h1>
        <p class="position">{{ $card->position }}</p>
        @if($card->company)
            <p class="company">{{ $card->company }}</p>
        @endif
    </div>

    <div class="vcard-actions">
        
        @if($card->phone)
            <a href="tel:{{ $card->phone }}" class="action-item">
                <span class="icon">&#9742;</span>
                <span class="label">CALL</span>
            </a>
        @endif

        @if($card->email)
            <a href="mailto:{{ $card->email }}" class="action-item">
                <span class="icon">&#9993;</span>
                <span class="label">EMAIL</span>
            </a>
        @endif

        @if($card->address)
            <a href="https://maps.google.com/?q={{ urlencode($card->address) }}" target="_blank" class="action-item">
                <span class="icon">&#9907;</span>
                <span class="label">DIRECTIONS</span>
            </a>
        @endif
    </div>

    <div class="vcard-details">

        @if($card->phone)
            <a href="tel:{{ $card->phone }}" class="detail-item">
                <span class="detail-icon">&#9742;</span>
                <div class="detail-text">
                    <p class="main-info">{{ $card->phone }}</p>
                    <p class="sub-info">Mobile</p>
                </div>
            </a>
        @endif

        @if($card->email)
            <a href="mailto:{{ $card->email }}" class="detail-item">
                <span class="detail-icon">&#9993;</span>
                <div class="detail-text">
                    <p class="main-info">{{ $card->email }}</p>
                    <p class="sub-info">Email</p>
                </div>
            </a>
        @endif

        @if($card->company || $card->position)
            <div class="detail-item">
                <span class="detail-icon">&#128188;</span> <div class="detail-text">
                    <p class="main-info">{{ $card->company }}</p>
                    <p class="sub-info">{{ $card->position }}</p>
                </div>
            </div>
        @endif

        @if($card->address)
            <a href="https://maps.google.com/?q={{ urlencode($card->address) }}" target="_blank" class="detail-item">
                <span class="detail-icon">&#9907;</span>
                <div class="detail-text">
                    <p class="main-info">{{ $card->address }}</p>
                    <p class="sub-info">Address</p>
                </div>
            </a>
        @endif

        @if($card->website)
            <a href="{{ $card->website }}" target="_blank" class="detail-item">
                <span class="detail-icon">&#127760;</span> <div class="detail-text">
                    <p class="main-info">{{ $card->website }}</p>
                    <p class="sub-info">Website</p>
                </div>
            </a>
        @endif
    </div>
    
    @if($card->vcard_link)
        <a href="{{ $card->vcard_link }}" download class="fab">
            &#43; 
        </a>
    @endif
</main>