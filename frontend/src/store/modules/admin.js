import adminServices from "../../services/admin.services";
export default {
    state: {
        // 類別 ex：其他類、學習類
        classify: {},
        // 單位名單 ex：校務資訊組
        dep: {},
        /**
         * DataTable 候選名單 欄位設計
         * text=>表格標題列 value=>表格內容
         */
        candidateHeaders: [{
            text: "候選人(項目)",
            align: "start",
            value: "name"
        },
        {
            text: "備註",
            value: "remarks",
            sortable: false
        },
        {
            text: "附件",
            value: "Appendix",
            sortable: false
        },
        {
            text: "動作",
            value: "actions",
            sortable: false
        }
        ],
        /**
         * DataTable 可投票名單 欄位設計
         * text=>表格標題列 value=>表格內容
         */
        joinHeaders: [{
            text: "單位",
            value: "department"
        },
        {
            text: "姓名",
            align: "start",
            value: "name"
        },
        {
            text: "性別",
            value: "sex"
        },
        {
            text: "附件",
            value: "Appendix",
            sortable: false
        },
        {
            text: "動作",
            value: "actions",
            sortable: false
        }
        ],
        needSignupItem: [{
            name: '是',
            value: 1
        }, {
            name: '否',
            value: 0
        }],
        // 投票規則選項
        rulesItem: [{
            name: '管理者指定名次',
            value: 1
        },
        {
            name: '投票決定',
            value: 2
        },
        {
            name: '評分決定',
            value: 3
        }
        ]

    },
    getters: {

    },
    mutations: {
        SET_CLASSIFY: (state, payload) => {
            state.classify = payload;
        },
        SET_DEP: (state, payload) => {
            state.dep = payload;
        }
    },
    actions: {
        GET_CLASSIFY(context) {
            adminServices
                .getClassify()
                .then(result => {
                    context.commit("SET_CLASSIFY", result.data);
                });
        },
        GET_DEP(context) {
            adminServices.getDep().then(result => {
                context.commit("SET_DEP", result.data);
            })
        },
        POST_ACTIVITY(context, payload) {
            return adminServices
                .post(payload)
                .then(data => {
                    return data;
                });
        }
    }
}