<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
    <style>
        /* Global Styles and Fonts */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', 'Helvetica Neue', Helvetica, sans-serif;
            background-color: #f0f0f0;
            overflow-x: hidden;
        }

        main.vcard-container {
            width: 100%;
            max-width: 500px;
            margin: auto;
            min-height: 100vh;
            background: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .vcard-header {
            background-color: #C07936;
            color: #fff;
            text-align: center;
            padding: 30px 20px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .vcard-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-image: url('{{ $card->avatar_url ?? 'default-avatar.png' }}'); 
            background-size: cover;
            background-position: center;
            margin-bottom: 15px;
            border: 3px solid rgba(255, 255, 255, 0.7);
        }

        .vcard-header h1 {
            margin: 0 0 5px 0;
            font-size: 1.8rem;
            font-weight: 500;
        }

        .vcard-header h6.title {
            margin: 0;
            font-size: 1rem;
            opacity: 0.9;
            font-weight: normal;
        }

        .vcard-header p.company {
            margin: 5px 0 0 0;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* VCard Actions Section */
        .vcard-actions {
            display: flex;
            justify-content: space-around;
            background-color: #C07936;
            color: #fff;
        }

        .action-item {
            flex: 1;
            text-align: center;
            padding: 15px 0;
            cursor: pointer;
            border-left: 1px solid rgba(255,255,255,0.2);
            text-decoration: none;
            color: inherit;
            transition: background-color 0.2s;
        }

        .action-item:first-child { border-left: none; }
        .action-item:hover { background-color: #A0622F; }

        .action-item .icon {
            display: block;
            /* DECREASED ICON SIZE HERE */
            font-size: 1.2em; 
            margin-bottom: 5px;
        }

        .action-item .label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        /* VCard Details - Model-Inspired Rows */
        .vcard-details {
            flex-grow: 1;
            padding: 10px 0;
        }

        .vcard-row {
            display: flex;
            padding: 15px 20px;
            text-decoration: none;
            color: inherit;
            align-items: center; 
        }
        
        .vcard-row:hover { background-color: #fafafa; }

        .detail-icon {
            font-size: 1.3em;
            color: #C07936; 
            width: 40px; 
            text-align: center;
            margin-right: 15px;
        }

        .detail-text { 
            flex-grow: 1; 
            padding-top: 5px;
        }
        
        .detail-text h4 { 
            margin: 0; 
            font-size: 0.8m; 
            color: #333; 
            font-weight: normal;
        }
        .detail-text small { 
            display: block;
            margin: 2px 0 0 0; 
            font-size: 0.8em; 
            color: #888; 
        }

        .vcard-separator {
            border-bottom: 1px solid #eee;
            margin: 0 15px 0 60px; 
        }


        /* Floating Action Button (FAB) */
        .fab {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 70px;
            height: 55px;
            border-radius: 50%;
            background-color: #E38D4F;
            color: white;
            border: none;
            font-size: 1.0em;
            line-height: 55px;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: background-color 0.2s;
            text-decoration: none;
            z-index: 100;
        }

        .fab:hover { background-color: #d17539; }
    </style>
</head>
<body>

<main class="vcard-container">
    <div class="vcard-header">
        <h1>{{ $card->name }}</h1>
        <h6 class="title">{{ $card->position }}</h6>
        @if($card->company)
            <p class="company">{{ $card->company }}</p>
        @endif
    </div>

    <div class="vcard-actions">
        @if($card->phone)
            <a href="tel:{{ $card->phone }}" class="action-item">
                <span class="icon"><i class="fas fa-phone"></i></span>
                <span class="label">Call</span>
            </a>
        @endif
        @if($card->email)
            <a href="mailto:{{ $card->email }}" class="action-item">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <span class="label">Email</span>
            </a>
        @endif
        {{-- ADDED DIRECTIONS BUTTON HERE --}}
        
        <a href="https://maps.app.goo.gl/Qemc7EarzyKhxJ94A" target="_blank" class="action-item">
            <span class="icon"><i class="fas fa-map-pin"></i></span>
            <span class="label">Directions</span>
        </a>
        
    </div>

    <div class="vcard-details">
        
        @if($card->phone)
            <a href="tel:{{ $card->phone }}" class="vcard-row">
                <span class="detail-icon"><i class="fas fa-mobile-alt"></i></span>
                <div class="detail-text">
                    <h4>{{ $card->phone }}</h4>
                    <small>Mobile</small>
                </div>
            </a>
            <div class="vcard-separator"></div>
        @endif
        
        @if($card->email)
            <a href="mailto:{{ $card->email }}" class="vcard-row">
                <span class="detail-icon"><i class="fas fa-at"></i></span>
                <div class="detail-text">
                    <h4>{{ $card->email }}</h4>
                    <small>Email</small>
                </div>
            </a>
            <div class="vcard-separator"></div>
        @endif
        
        {{-- Company/Position Field --}}
        @if($card->company || $card->position)
            <div class="vcard-row">
                <span class="detail-icon"><i class="fas fa-building"></i></span>
                <div class="detail-text">
                    <h4>{{ $card->company }}</h4>
                    <small>{{ $card->position }}</small>
                </div>
            </div>
            <div class="vcard-separator"></div>
        @endif
        
        {{-- ADDED ADDRESS FIELD HERE --}}
        
            <a href="https://maps.app.goo.gl/Qemc7EarzyKhxJ94A" target="_blank" class="vcard-row">
                <span class="detail-icon"><i class="fas fa-location-dot"></i></span>
                <div class="detail-text">
                    <h4>
Said Ibn Zaqar
Jeddah, Makkah Province 23334
Saudi Arabia</h4>
                    <small>Address</small>
                </div>
            </a>
            <div class="vcard-separator"></div>
        

        {{-- Website Field --}}
        <a href="https://capi-ksa.com/" target="_blank" class="vcard-row">
            <span class="detail-icon"><i class="fas fa-globe"></i></span>
            <div class="detail-text">
                <h4>capi-ksa.com</h4>
                <small>Website</small>
            </div>
        </a>
    </div>

    <button class="fab" onclick="downloadVCard()">
        <i class="fas fa-user-plus"></i>
    </button>
</main>

<script>
function downloadVCard() {
    // Note: Use urlencode() or similar function in your backend to ensure safe output
    const vCardData = `
BEGIN:VCARD
VERSION:3.0
FN:{{ $card->name }}
ORG:{{ $card->company }}
TITLE:{{ $card->position }}
TEL;TYPE=CELL:{{ $card->phone }}
EMAIL:{{ $card->email }}
ADR:;;{{ $card->address }};;;
URL:https://capi-ksa.com/
END:VCARD
    `.trim();

    const blob = new Blob([vCardData], { type: 'text/vcard' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = '{{ $card->name }}.vcf';
    a.click();
    URL.revokeObjectURL(url);
}
</script>

</body>
</html>