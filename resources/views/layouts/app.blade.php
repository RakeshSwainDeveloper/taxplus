<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- App CSS/JS -->
    @vite(['resources/css/header.css', 'resources/css/footer.css', 'resources/js/header.js'])
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js'])
    @stack('styles')
</head>

<body>

    {{-- Header --}}
    @include('layouts.header')
    <!-- {{-- Show sidebar only if NOT on service or contact pages --}} -->
    @if (!request()->is('itr-filing') && !request()->is('contact*'))
    @include('layouts.sidebar')
    @endif

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Floating Chart Assistant --}}
    <!-- <div id="chat-icon"
        style="position:fixed; bottom:20px; right:20px; background:#2563eb; color:white; 
                border-radius:50%; width:60px; height:60px; display:flex; align-items:center; 
                justify-content:center; cursor:pointer; box-shadow:0 4px 10px rgba(0,0,0,0.2); z-index:9999;">
        <i class="bi bi-chat-dots fs-3"></i>
    </div>

    <div id="chat-box"
        style="position:fixed; bottom:90px; right:20px; width:320px; background:white; 
                border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.3); display:none; 
                flex-direction:column; overflow:hidden; font-family:sans-serif; z-index:9999;">

        <div style="background:#2563eb; color:white; padding:10px; font-weight:bold;">
            Chart Assistant 🤖
        </div>

        <div id="chat-body" style="padding:10px; height:240px; overflow-y:auto;">
            <div>Hi! What would you like to see?</div>
            <button class="chat-btn btn btn-sm btn-outline-primary mt-2 w-100 text-start" data-msg="user_chart">📊 ITR</button>
            <button class="chat-btn btn btn-sm btn-outline-success mt-2 w-100 text-start" data-msg="revenue_chart">💰 GST</button>
            <button class="chat-btn btn btn-sm btn-outline-warning mt-2 w-100 text-start" data-msg="performance_chart">🚀 OTHERS</button>
        </div>

        <canvas id="chatChart" style="width:100%; height:150px; display:none;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.getElementById('chat-icon').addEventListener('click', () => {
            const box = document.getElementById('chat-box');
            box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'flex' : 'none';
        });

        document.querySelectorAll('.chat-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const messageKey = btn.dataset.msg;
                const chatBody = document.getElementById('chat-body');
                const chartCanvas = document.getElementById('chatChart');

                chatBody.innerHTML += `<div class="mt-2 text-end"><b>🧑‍💼 ${btn.innerText}</b></div>`;
                chatBody.innerHTML += `<div>🤖 Processing...</div>`;

                const res = await fetch("{{ route('chat.widget.reply') }}", {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        message: messageKey
                    })
                });

                const data = await res.json();

                chatBody.innerHTML += `<div class="mt-2">🤖 ${data.reply}</div>`;

                if (data.chartData.length > 0) {
                    chartCanvas.style.display = 'block';
                    const ctx = chartCanvas.getContext('2d');
                    if (window.chatChart) window.chatChart.destroy();
                    window.chatChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                            datasets: [{
                                label: 'Data',
                                data: data.chartData,
                                backgroundColor: 'rgba(37,99,235,0.5)',
                                borderColor: '#2563eb',
                                borderWidth: 1
                            }]
                        }
                    });
                }

                chatBody.scrollTop = chatBody.scrollHeight;
            });
        });
    </script> -->
    <script>
        const IS_LOGGED_IN = @json(auth()->check());
        const LOGIN_URL = "{{ route('login') }}";
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>