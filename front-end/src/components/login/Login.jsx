function Login() {
  return (
    <div>
      <h2> Login page</h2>
      <form action="">
        <label htmlFor="email">Email: </label>
        <input type="email" id="email" />
        <label htmlFor="password">Password: </label>
        <input type="password" id="password" />
        <button> Connecter</button>
      </form>
    </div>
  );
}

export default Login;
