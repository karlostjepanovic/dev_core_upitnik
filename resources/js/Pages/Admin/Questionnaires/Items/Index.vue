<template>
    <div>
        <div class="title-section">
            <div class="title">{{ this.questionnaire.name + ' - ' + this.questionnaire.type }}</div>
            <Link class="button blue ghost" href="/admin/questionnaires">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="title-section">
            <Link class="button blue" :href="`/admin/questionnaires/${this.questionnaire.id}/items/create`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Dodaj česticu
            </Link>
        </div>
        <div class="table-wrap" v-if="this.questionnaire.items.length">
            <table>
                <thead>
                <tr>
                    <th width="45%">Čestica</th>
                    <th class="no-padding-labels">
                        <div class="labels">
                            <div class="label"><div>Nikada</div></div>
                            <div class="label"><div>Vrlo rijetko</div></div>
                            <div class="label"><div>Ponekad</div></div>
                            <div class="label"><div>Često</div></div>
                            <div class="label"><div>Gotovo uvijek</div></div>
                        </div>
                    </th>
                    <th>Dimenzija</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, i) in this.questionnaire.items" :key="item.id" class="hover">
                    <td>
                        <div class="item">
                            <div class="order">{{(i + 1) + '.'}}</div>
                            <div class="question">{{ item.question }}</div>
                        </div>
                    </td>
                    <td class="no-padding-answers">
                        <div class="answers">
                            <template v-if="item.ascending_order">
                                <div class="box">0</div>
                                <div class="box">1</div>
                                <div class="box">2</div>
                                <div class="box">3</div>
                                <div class="box">4</div>
                            </template>
                            <template v-else>
                                <div class="box">4</div>
                                <div class="box">3</div>
                                <div class="box">2</div>
                                <div class="box">1</div>
                                <div class="box">0</div>
                            </template>
                        </div>
                    </td>
                    <td>{{ item.dimension_value }}</td>
                    <td>
                        <EditObject :id="item.id" path="show"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedna čestica za prikaz!</div>
    </div>
</template>

<script>
import AdminTemplate from "../../AdminTemplate.vue";
import EditObject from "../../../../Shared/EditObject.vue";

export default {
    name: "Index",
    components: {EditObject},
    layout: AdminTemplate,
    props: {
        questionnaire: Object,
    },
}
</script>

<style scoped>
.no-padding-labels {
    padding: 0 25px;
    height: 80px;
}

.labels {
    display: flex;
    height: 100%;
}

.label {
    width: 46px;
    position: relative;
    display: flex;
    height: 100%;
    justify-content: flex-start;
    user-select: none;
}

.label div {
    width: 80px;
    position: absolute;
    bottom: 30px;
    right: -35px;
    transform: rotate(-50deg);
    font-size: 90%;
}

.item {
    display: flex;
    align-items: flex-start;
    gap: 5px;
}

.item .order {
    font-weight: bold;
}

.no-padding-answers {
    padding: 0 25px;
}

.answers {
    display: flex;
    gap: 8px;
}

.box {
    border: 1px solid var(--light-gray);
    font-size: 90%;
    color: var(--gray);
    border-radius: 3px;
    background-color: #FFF;
    user-select: none;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
