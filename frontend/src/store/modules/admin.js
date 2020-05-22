import adminServices from "../../services/admin.services";
export default {
    state: {
        classify: {},
        dep: {},
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
        joinHeaders: [{
                text: "單位",
                value: "develop"
            },
            {
                text: "候選人(項目)",
                align: "start",
                value: "name"
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
            adminServices
                .post(payload)
                .then(result => {
                    console.log(result.data);
                });
        }
    }
}