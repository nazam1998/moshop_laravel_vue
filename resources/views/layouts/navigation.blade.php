<v-app-bar app>
    <v-toolbar-title>
        <v-btn href="/" tag="span" style="cursor: pointer">
            MoShop
        </v-btn>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-xs-only">
        <v-btn href="/">
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
            <v-btn>

                <v-form action="logout" method="post">
                    @csrf
                    <v-btn href="dashboard">{{ Auth::user()->profile->firstname }}</v-btn>
                    <v-btn type="submit">Logout</v-btn>
                </v-form>
            </v-btn>
        @endguest
    </v-toolbar-items>
</v-app-bar>
