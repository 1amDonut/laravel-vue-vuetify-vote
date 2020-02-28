<template>
    <div>
        <v-list-item>
            <v-list-item-content>
                <v-list-item-title>John Leider</v-list-item-title>
            </v-list-item-content>
            <v-spacer />
            <v-btn text color="primary" @click="dialog = false">取消</v-btn>
            <v-btn text @click="dialog = false">送出</v-btn>
        </v-list-item>

        <v-divider></v-divider>

        <v-card>

            <v-container>
                <v-row class="mx-2">
                    <v-col cols="12">
                        <v-stepper v-model="e6" vertical>
                            <v-stepper-step :complete="e6 > 1" step="1"
                                :rules="[() => !errors.has('name') && !errors.has('email')]">
                                建立投票活動
                                <!-- <small>Summarize if needed</small> -->
                            </v-stepper-step>

                            <v-stepper-content step="1">
                                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                                <v-row align="center" class="mr-0">
                                    <v-avatar size="40px" class="mx-3">
                                        <!-- <img src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png" alt=""> -->
                                    </v-avatar>

                                </v-row>
                                <v-text-field placeholder="投票活動" :rules="rules.name" label="標題" required />

                                <v-btn color="primary" @click="e6 = 2" :disabled="!(code.length === 12)">繼續</v-btn>
                                <v-btn text>取消</v-btn>
                            </v-stepper-content>

                            <v-stepper-step :complete="e6 > 2" step="2">編輯條件
                            </v-stepper-step>

                            <v-stepper-content step="2">

                                <v-col cols="6">
                                    <v-menu v-model="menu" :close-on-content-click="false" :nudge-right="40"
                                        transition="scale-transition" offset-y min-width="290px">
                                        <template v-slot:activator="{ on }">
                                            <v-text-field v-model="startDate" label="開始日期" prepend-icon="" readonly
                                                v-on="on">
                                            </v-text-field>
                                        </template>
                                        <v-date-picker v-model="startDate" @input="menu = false"></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col cols="6">
                                    <v-menu v-model="menu2" :close-on-content-click="false" :nudge-right="40"
                                        transition="scale-transition" offset-y min-width="290px">
                                        <template v-slot:activator="{ on }">
                                            <v-text-field v-model="endDate" label="結束日期" prepend-icon="" readonly
                                                v-on="on">
                                            </v-text-field>
                                        </template>
                                        <v-date-picker v-model="endDate" @input="menu2 = false"></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col cols="12">
                                    <v-textarea outlined name="input-7-4" label="活動說明">
                                    </v-textarea>
                                </v-col>
                                <v-col cols="6">
                                    <v-select :items="items" label="活動類別"></v-select>
                                    <!-- <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="開始日期" /> -->
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field type='number' min='1' placeholder="投票數" />
                                </v-col>
                                <v-btn color="primary" @click="e6 = 3">繼續</v-btn>
                                <v-btn text @click="e6=1">取消</v-btn>
                            </v-stepper-content>

                            <v-stepper-step :complete="e6 > 3" step="3">加入投票項目
                            </v-stepper-step>

                            <v-stepper-content step="3">
                                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                                <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
                                <v-btn text>Cancel</v-btn>
                            </v-stepper-content>

                            <v-stepper-step step="4">View setup instructions</v-stepper-step>
                            <v-stepper-content step="4">
                                <v-file-input label="File input" outlined dense></v-file-input>
                                <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
                                <v-btn text>Cancel</v-btn>
                            </v-stepper-content>
                        </v-stepper>
                        <!---example--->
                        <v-stepper v-model="booking" vertical>
                            <v-stepper-step step="1" v-bind:complete="booking > 1">
                                Validate Voucher Reference Code
                                <small>Voucher reference code needs to be provided by client</small>
                            </v-stepper-step>
                            <v-stepper-content step="1">
                                <form @keydown.enter.prevent="validate">
                                    <v-flex xs12>
                                        <v-text-field v-model="code" name="code" id="code" label="Reference Code"
                                            :counter="12" :error-messages="rules.name"
                                            v-validate="'required|max:12'" required></v-text-field>
                                    </v-flex>
                                    <v-btn color="primary" @click.native="booking = 2"
                                        :disabled="!(code.length === 12)">Continue</v-btn>
                                </form>
                            </v-stepper-content>
                            <v-stepper-step step="2" v-bind:complete="booking > 2">Pick a Date</v-stepper-step>
                            <v-stepper-content step="2">
                                <v-flex xs12>
                                    <v-date-picker v-model="date" landscape></v-date-picker>
                                </v-flex>
                                <v-btn flat @click.native="booking = 1">Back</v-btn>
                                <v-btn color="primary" @click.native="booking = 3" :disabled="!date">Continue</v-btn>
                            </v-stepper-content>
                            <v-stepper-step step="3" v-bind:complete="booking > 3">Pick a time</v-stepper-step>
                            <v-stepper-content step="3">
                                <v-flex xs12>
                                    <v-time-picker v-model="time" landscape
                                        :allowed-minutes="(value) => value % 15 === 0"></v-time-picker>
                                </v-flex>
                                <v-btn flat @click.native="booking = 2">Back</v-btn>
                                <v-btn color="primary" @click.native="booking = 4">Continue</v-btn>
                            </v-stepper-content>
                            <v-stepper-step step="4">View setup instructions</v-stepper-step>
                            <v-stepper-content step="4">
                                <v-flex xs12>
                                    <v-select label="Experience Name" v-model="experience" :items="experiences"
                                        item-value="id" item-text="name" single-line bottom required></v-select>
                                </v-flex>
                                <v-btn flat @click.native="booking = 3">Back</v-btn>
                                <v-btn color="primary" @click="submit" :disabled="!experience">Create Booking</v-btn>
                            </v-stepper-content>
                        </v-stepper>
                    </v-col>

                </v-row>
            </v-container>

        </v-card>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                menu: '',
                menu2: '',
                items: [],
                e6: 1, //stepper
                startDate: '', //投票開始日期
                endDate: '', //投票結束日期
                rules: {
                    age: [
                        val => val < 10 || `I don't believe you!`,
                    ],
                    animal: [val => (val || '').length > 0 || 'This field is required'],
                    name: [val => (val || '').length > 0 || '問卷標題不能空白'],
                },
                booking: 1,
                valid: true,
                code: "",
                date: null,
                time: null,
                experience: null,
                experiences: [{
                        id: 1,
                        name: "Example A"
                    },
                    {
                        id: 2,
                        name: "Example B"
                    }
                ]
            }
        },
        methods: {
            submit() {
                this.$nextTick(() => this.reset());
            },
            reset() {
                // Reset all value
                this.code = "";
                this.date = null;
                this.time = null;
                this.experience = "";
                this.experiences = [];

                // Reset error message
                this.errors.clear();
                this.$validator.reset();
                this.booking = 1;
            }
        },
    }
</script>