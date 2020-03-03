<template>
  <div>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>{{ form.title }}</v-list-item-title>
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
            <!--***********************
              *
              * 建立投票活動
              *
            ***********************-->
            <v-stepper v-model="e6" vertical>
              <v-stepper-step :complete="e6 > 1" step="1">
                建立投票活動
                <!-- <small>Summarize if needed</small> -->
              </v-stepper-step>

              <v-stepper-content step="1">
                <!--***********************
              * 標題
                ***********************-->
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                <v-row align="center" class="mr-0">
                  <v-avatar size="40px" class="mx-3">
                    <!-- <img src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png" alt=""> -->
                  </v-avatar>
                </v-row>
                <v-row>
                  <v-col cols="4">問卷名稱</v-col>
                  <v-col cols="8">
                    <v-text-field
                      v-model="form.title"
                      placeholder="投票活動"
                      label="標題"
                      :rules="nameRules"
                      v-validate="'required'"
                      outlined
                      required
                    />
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="4">歡迎文字</v-col>
                  <v-col cols="8">
                    <v-textarea outlined name="input-7-4" label="歡迎文字"></v-textarea>
                  </v-col>
                </v-row>
                <v-btn color="primary" @click="e6 = 2" :disabled="!(form.title.length != '')">繼續</v-btn>

                <v-btn text>取消</v-btn>
              </v-stepper-content>

              <v-stepper-step :complete="e6 > 2" step="2">編輯條件</v-stepper-step>

              <v-stepper-content step="2">
                <!--***********************
                    * 編輯條件
                ***********************-->
                <v-col cols="6">
                  <v-menu
                    v-model="menu"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="form.startDate"
                        label="開始日期"
                        prepend-icon
                        readonly
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker v-model="form.startDate" @input="menu = false"></v-date-picker>
                  </v-menu>
                </v-col>
                <v-col cols="6">
                  <v-menu
                    v-model="menu2"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="form.endDate"
                        label="結束日期"
                        prepend-icon
                        readonly
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker v-model="form.endDate" @input="menu2 = false"></v-date-picker>
                  </v-menu>
                </v-col>
                <v-col cols="12">
                  <v-textarea outlined v-model="form.Description" name="input-7-4" label="活動說明"></v-textarea>
                </v-col>
                <v-col cols="6">
                  <v-select :items="items" label="活動類別"></v-select>
                  <!-- <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="開始日期" /> -->
                </v-col>
                <v-col cols="6">
                  <v-text-field type="number" min="1" v-model="form.votes" placeholder="投票數" />
                </v-col>
                <v-btn color="primary" @click="e6 = 3" :disabled="isDisabled">繼續</v-btn>
                <v-btn text @click="e6 = 1">取消</v-btn>
              </v-stepper-content>
              <!--***********************
                    * 加入投票項目包含名稱，說明
              ***********************-->
              <v-stepper-step :complete="e6 > 3" step="3">加入投票項目</v-stepper-step>

              <v-stepper-content step="3">
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                <v-row>
                  <v-col cols="6">
                    <v-text-field type="text" placeholder="名稱" />
                  </v-col>
                  <v-col cols="6">
                    <v-text-field type="text" placeholder="說明" />
                  </v-col>
                </v-row>
                <!--***********************
                    * todo table
                ***********************-->
                <v-simple-table>
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Calories</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in desserts" :key="item.name">
                        <td>{{ item.name }}</td>
                        <td>{{ item.calories }}</td>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
               
                <v-btn color="primary" @click="e6 = 4">繼續</v-btn>
                <v-btn text>取消</v-btn>
              </v-stepper-content>
              <!--***********************
                    * 可投票名單
              ***********************-->
              <v-stepper-step step="4">可投票名單</v-stepper-step>
              <v-stepper-content step="4">
                <v-file-input label="File input" outlined dense></v-file-input>
                <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
                <v-btn text>Cancel</v-btn>
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
      menu: "",
      menu2: "",
      items: [],
      e6: 1, //stepper
      rules: {
        age: [val => val < 10 || `I don't believe you!`],
        animal: [val => (val || "").length > 0 || "This field is required"],
        name: [val => (val || "").length > 0 || "問卷標題不能空白"]
      },
      form: {
        title: "", //標題
        startDate: null, //投票開始日期
        endDate: null, //投票結束日期
        Description: "", //活動說明
        selectType: "", //活動類別
        votes: "", //投票數
        file: [] //Excel名單
      },
      nameRules: [
        val => !!val || "Name is required",
        val =>
          (val && val.length <= 10) || "Name must be less than 10 characters"
      ],
      booking: 1,
      valid: true
    };
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
  computed: {
    isDisabled() {
      if (!this.form.startDate) return true;
      if (!this.form.endDate) return true;
      if (!this.form.Description) return true;
      if (!this.form.votes) return true;
      return false;
    }
  }
};
</script>
