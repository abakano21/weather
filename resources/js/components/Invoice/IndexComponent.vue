<template>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">School Name</th>
        <th scope="col">Description</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        <th scope="col">Username</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="invoice in loadedInvoices" :key="invoice.id">
        <td>{{ invoice.school_name }}</td>
        <th scope="row">{{ invoice.description }}</th>
        <td>{{ invoice.amount }}</td>
        <td>{{ invoice.is_paid==0 ? 'New' : 'Payment received' }}</td>
        <td>{{ invoice.link }}</td>
        <td>{{ invoice.username }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      loadedInvoices: [],
    }
  },

  mounted() {
    this.loadInvoices();    
  },

  methods: {
    loadInvoices() {
      axios.get("api/v1/invoices").then((response) => {
        this.loadedInvoices = response.data.data;
        // console.log(response.status);
        // console.log(response.statusText);
        // console.log(response.headers);
        // console.log(response.config);
      });
    }
  }
};
</script>
