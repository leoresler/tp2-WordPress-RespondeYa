import { useEffect } from 'react';
import { useNavigate, useSearchParams } from 'react-router-dom';

const GoogleCallback = () => {
  const navigate = useNavigate();
  const [searchParams] = useSearchParams();

  useEffect(() => {
    const token = searchParams.get('token');
    const userStr = searchParams.get('user');
    const error = searchParams.get('error');

    if (error) {
      // Manejar error
      console.error('Error en autenticación:', error);
      navigate('/login', { replace: true });
      return;
    }

    if (token && userStr) {
      try {
        const user = JSON.parse(decodeURIComponent(userStr));
        
        // Guardar en localStorage
        localStorage.setItem('token', token);
        localStorage.setItem('user', JSON.stringify(user));

        // Redirigir a la página de bienvenida
        navigate('/bienvenido', { replace: true });
      } catch (err) {
        console.error('Error procesando datos de usuario:', err);
        navigate('/login', { replace: true });
      }
    } else {
      navigate('/login', { replace: true });
    }
  }, [navigate, searchParams]);

  return (
    <div className='flex items-center justify-center h-screen'>
      <div className='text-center'>
        <div className='animate-spin rounded-full h-12 w-12 border-b-2 border-amber-600 mx-auto'></div>
        <p className='mt-4 text-gray-600'>Iniciando sesión...</p>
      </div>
    </div>
  );
};

export default GoogleCallback;