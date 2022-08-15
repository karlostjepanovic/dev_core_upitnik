<template>
    <div>
        <div class="title-section">
            <Link class="button blue" href="/admin/schools/create">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Dodaj školu
            </Link>
        </div>
        <div class="table-wrap" v-if="schools.length">
            <table>
                <thead>
                <tr>
                    <th>Škola</th>
                    <th>Adresa</th>
                    <th>Mjesto</th>
                    <th>OIB</th>
                    <th>Odgovorna osoba</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="school in schools" :key="school.id" class="hover">
                    <td>{{ school.name }}</td>
                    <td>{{ school.address }}</td>
                    <td>{{ school.place }}</td>
                    <td>{{ school.oib }}</td>
                    <td>{{ school.supervisor.firstname + ' ' + school.supervisor.lastname }}</td>
                    <td>
                        <EditObject :id="school.id" path="show"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedna škola za prikaz!</div>
    </div>
</template>

<script>
import AdminTemplate from "../AdminTemplate.vue";
import EditObject from "../../../Shared/EditObject.vue";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Index",
    components: {Link, EditObject},
    layout: AdminTemplate,
    props: {
        schools: Array,
    },
}
</script>

<style scoped>

</style>
