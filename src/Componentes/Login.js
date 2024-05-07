import React, { useState } from 'react';
import axios from 'axios';

function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.post('http://localhost/App-Gio/user-frontend/user-backend/login.php', `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`, {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                }
            });
            alert(response.data);
        } catch (error) {
            console.error('An error occurred:', error);
            alert('Failed to login');
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <h2>Login</h2>
            <input type="email" value={email} onChange={e => setEmail(e.target.value)} placeholder="Email" required />
            <input type="password" value={password} onChange={e => setPassword(e.target.value)} placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
    );
}

export default Login;
