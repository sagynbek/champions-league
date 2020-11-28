import { SnackbarProvider } from 'notistack';
import React, { useEffect, useState } from 'react';
import './App.css';
import AppContainer from './app/AppContainer';
import AppNotification from './instances/AppNotification';


function App() {
  return (
    <SnackbarProvider maxSnack={3}>
      <AppContainer />
      <AppNotification />
    </SnackbarProvider>
  );
}

export default App;
