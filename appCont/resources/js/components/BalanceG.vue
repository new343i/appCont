<template>
    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>IDTC</th>
                    <th>TipoConcep</th>
                    <th>IDClas</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tipo in tipoC" :key="tipo.IDTC">
                    <td>{{ tipo.IDTC }}</td>
                    <td>{{ tipo.TipoConcep }}</td>
                    <td>{{ tipo.IDClas }}</td>
                    <td>{{ tipo.created_at }}</td>
                    <td>{{ tipo.updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                tipoC: null
            };
        },
        created() {
            this.fetchData();
            setInterval(this.fetchData, 4000);
        },
        methods: {
            fetchData() {
                axios.get('http://127.0.0.1:9000/tipoC')
                    .then(response => (
                        this.tipoC = response.data
                    ))
                    .catch(error => {
                        console.error('Error Obteniendo datos: ', error);
                    });
            },
        },
    };
</script>
<style scoped>
    .contenedor-tabla{
        display: flex;
        flex-wrap: wrap;
        transform: translate(12%, 0%);
        width: 81%;
        height: auto;
        margin-bottom: 50px;
        background-color: whitesmoke;
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        text-align: center;
    }
    .table{
        font-size: 16px;
        border-radius: 10px;
        width: 100%;
    }
    .table thead{
        background: #c9dff0;
    }
    .table thead tr th{
        font-weight: bold;
        padding: 2% 1%;
    }
    .table tbody tr{
        color: #555;
    }
</style>
