import React, { useEffect, useState } from 'react';
import LeagueTable from '../components/LeagueTable';
import ListSeasons from '../components/ListSeasons';
import MatchResults from '../components/MatchResults';
import Predictions from '../components/Predictions';
import { WeekContext } from '../contexts/WeekContext';
import { SeasonContext } from '../contexts/SeasonContext';
import { ISeason, IWeekGameStatus, IWeeklyStanding } from '../types/types';
import { LeagueContext } from '../contexts/LeagueContext';



function AppContainer() {
  const [activeSeason, setActiveSeason] = useState<undefined | number>(undefined);
  const [seasons, setSeasons] = useState<ISeason[]>([]);

  const [activeWeek, setActiveWeek] = useState<undefined | number>(undefined);
  const [weekPlayedStatus, setWeekPlayedStatus] = useState<IWeekGameStatus>("None");
  const [weekCount, setWeekCount] = useState(0);

  const [leagues, setLeagues] = useState<IWeeklyStanding[]>([]);
  const [leagueRefreshKey, setLeagueRefreshKey] = useState("");

  useEffect(() => {
    if (activeSeason) {
      setActiveWeek(1);
    }
    else {
      setActiveWeek(undefined);
    }
  }, [activeSeason]);

  const refreshLeagues = () => {
    setLeagueRefreshKey((Math.random() * 1000000).toString());
  }

  return (
    <SeasonContext.Provider value={{ activeSeason, setActiveSeason, seasons, setSeasons }}>
      <WeekContext.Provider value={{ activeWeek, setActiveWeek, weekCount, setWeekCount, weekPlayedStatus, setWeekPlayedStatus }}>
        <LeagueContext.Provider value={{ leagues, setLeagues, leagueRefreshKey, refreshLeagues }}>
          <div className="App">
            <header className="App-header">
              <ListSeasons />

              <LeagueTable />
              <MatchResults />
              {
                weekPlayedStatus === "NotPlayed" &&
                <Predictions />
              }
            </header>
          </div>
        </LeagueContext.Provider>
      </WeekContext.Provider>
    </SeasonContext.Provider>
  );
}

export default AppContainer;
