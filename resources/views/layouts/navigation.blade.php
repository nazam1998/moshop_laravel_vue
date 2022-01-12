<v-app-bar app>
    <v-toolbar-title>
        <v-btn href="/" tag="span" style="cursor: pointer">
            MoShop
        </v-btn>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-xs-only">
        <v-btn href="/">
            <v-icon>home</v-icon>
            Home
        </v-btn>
        @guest
            <v-btn href="/register">
                Register
            </v-btn>
            <v-btn href="/login">
                Login
            </v-btn>
        @else
            <v-btn href="/shop">
                <v-icon>list</v-icon>All Shops
            </v-btn>
            <v-btn href="/order">
                <v-icon>list</v-icon>My Orders
            </v-btn>
            <v-btn href="/cart">
                <v-icon>shopping</v-icon>My Cart @if(Auth::user()->cart->cartDetails->count() >0)<v-badge class="mx-2" content="{{ Auth::user()->cart->cartDetails->count() }}"></v-badge>@endif
            </v-btn>
            <v-btn href="/shop/{{ Auth::user()->shop->id }}">
                <v-icon>shopping-cart</v-icon>My Shop
            </v-btn>
            <v-btn href="/dashboard">
                <v-icon>person</v-icon>{{ Auth::user()->profile->firstname }}
            </v-btn>
            <v-btn>

                <v-form action="/logout" method="POST">
                    @csrf
                    <v-btn type="submit">Logout</v-btn>
                </v-form>
            </v-btn>
        @endguest
    </v-toolbar-items>
</v-app-bar>
