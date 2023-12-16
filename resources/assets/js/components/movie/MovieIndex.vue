<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createCompany'}" class="btn btn-success">Create new company</router-link>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Companies list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Begin At</th>
                        <th width="100"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="movie, index in movies">
                        <td>{{ movie.title }}</td>
                        <td>{{ movie.description }}</td>
                        <td>{{ movie.price }}</td>
                        <td>{{ movie.begin_at }}</td>
                        <td>
                            <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(company.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            companies: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/api/v1/companies')
            .then(function (resp) {
                app.companies = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not load companies");
            });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Do you really want to delete it?")) {
                var app = this;
                axios.delete('/api/v1/companies/' + id)
                    .then(function (resp) {
                        app.companies.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Could not delete company");
                    });
            }
        }
    }
}
</script>
