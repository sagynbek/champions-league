import { useSnackbar, OptionsObject } from 'notistack';
import React, { useEffect } from 'react';


declare global {
  interface Window {
    toast: (message: React.ReactNode, options?: OptionsObject | undefined) => void,
  }
}

const AppNotification = () => {
  const { enqueueSnackbar } = useSnackbar();

  useEffect(() => {
    window.toast = enqueueSnackbar;
  }, [enqueueSnackbar]);

  return null;
}

export default AppNotification;
