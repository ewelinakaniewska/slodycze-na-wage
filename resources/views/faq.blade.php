@include('shared.head', ['pageTitle' => 'FAQ'])
<body>
    @include('shared.navbar')
    <div class="container  mt-5">
    <h1>FAQ</h1>
        <div class="container mt-4">
        
        <h4>1. Jak działają nasze zamówienia?</h4>
        <p>Możesz przeglądać naszą ofertę słodyczy i zamówić wybrane produkty. Każdy produkt ma podaną cenę oraz dostępność w magazynie.</p>
        <h4>2. Aktualizacja stanów magazynowych</h4>
        <p>System automatycznie aktualizuje ilość produktów w magazynie po złożeniu zamówienia. Jeśli jakiś produkt jest niedostępny w wymaganej ilości, otrzymasz odpowiedni komunikat.</p>
        <h4>3. Cena w momencie zamówienia</h4>
        <p>Cena każdego produktu w zamówieniu jest zapisywana w momencie jego składania. Nawet jeśli cena produktu zmieni się później, w Twoim zamówieniu pozostaje niezmieniona.</p>
        <h4>4. Zyski użytkownika:</h4>
        <ul>
            <li>Przejrzystość cen: Dokładnie wiesz, ile płacisz za każdy produkt.</li>
            <li>Gwarancja dostępności: Zamawiasz tylko te produkty, które są dostępne.</li>
            <li>Pewność transakcji: Cena nie zmienia się po złożeniu zamówienia.</li>
        </ul>
        <h4>5. Straty użytkownika:</h4>
        <ul>
            <li>Możliwość braku niektórych produktów: Jeśli produkt jest niedostępny, nie będziesz mógł go zamówić w żądanej ilości.</li>
            <li>Brak natychmiastowych zmian: Jeśli cena produktu spadnie po złożeniu zamówienia, nie będziesz mógł skorzystać z nowej, niższej ceny.</li>
        </ul>
        </div>
    </div>
    @include('shared.footer')
</body>
</html>