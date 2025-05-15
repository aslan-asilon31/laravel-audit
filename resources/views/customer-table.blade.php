<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
      <tr>
        <td>{{ $customer['id'] }}</td>
        <td>{{ $customer['first_name'] }}</td>
        <td>{{ $customer['last_name'] }}</td>
        <td>{{ $customer['email'] }}</td>
        <td>{{ \Carbon\Carbon::parse($customer['created_at'])->format('Y-m-d H:i:s') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
