<template>
    <div>
        <v-navigation-drawer app dark clipped>
            <v-list dense>
                <v-list-item class="mt-4" link>
                    <v-list-item-action>
                        <v-icon color="grey darken-1">mdi-settings</v-icon>
                    </v-list-item-action>
                    <v-list-item-title class="white--text text--darken-1">問卷總覽</v-list-item-title>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-action>
                        <v-icon color="grey darken-1">mdi-plus-circle-outline</v-icon>
                    </v-list-item-action>
                    <v-list-item-title class="white--text text--darken-1">
                        <router-link to="new" class="white--text">建立問卷 </router-link>
                    </v-list-item-title>
                </v-list-item>
                <!-- <v-list-item link>
                    <v-list-item-action>
                        <v-icon color="grey darken-1">mdi-settings</v-icon>
                    </v-list-item-action>
                    <v-list-item-title class="white--text text--darken-1">統計圖表</v-list-item-title>
                </v-list-item> -->
            </v-list>
        </v-navigation-drawer>
    </div>
</template>