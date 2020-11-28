import React, { useEffect, useState } from 'react';
import LeagueTable from '../components/LeagueTable';
import ListSeasons from '../components/ListSeasons';
import MatchResults from '../components/MatchResults';
import Predictions from '../components/Predictions';
import { WeekContext } from '../contexts/WeekContext';
import { SeasonContext } from '../contexts/SeasonContext';
import { ISeason, IWeek, IWeekGameStatus, IWeeklyStanding } from '../types/types';
import { LeagueContext } from '../contexts/LeagueContext';
import { axiosInst } from '../api/Request';



function AppContainer() {
  const [activeSeason, setActiveSeason] = useState<undefined | number>(undefined);
  const [seasons, setSeasons] = useState<ISeason[]>([]);

  const [weeks, setWeeks] = useState<IWeek[]>([]);
  const [activeWeek, setActiveWeek] = useState<undefined | number>(undefined);
  const [weekPlayedStatus, setWeekPlayedStatus] = useState<IWeekGameStatus>("None");
  const [weekCount, setWeekCount] = useState(0);

  const [leagues, setLeagues] = useState<IWeeklyStanding[]>([]);
  const [leagueRefreshKey, setLeagueRefreshKey] = useState("");

  useEffect(() => {
    if (activeSeason) {
      axiosInst.get(`/week/${activeSeason}`)
        .then(res => {
          setWeeks(res.data.data);
          setActiveWeek(res.data.data[0].id);
        })
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
      <WeekContext.Provider value={{ weeks, activeWeek, setActiveWeek, weekCount, setWeekCount, weekPlayedStatus, setWeekPlayedStatus }}>
        <LeagueContext.Provider value={{ leagues, setLeagues, leagueRefreshKey, refreshLeagues }}>
          <div className="App">
            <header className="App-header" >
              <div style={{ marginBottom: "3em" }}>
                <ListSeasons />
              </div>
              <div style={{ display: "grid", gridTemplateColumns: "auto auto auto", gridColumnGap: "50px" }}>
                <LeagueTable />
                <MatchResults />
                {
                  weekPlayedStatus === "NotPlayed" &&
                  <Predictions />
                }
              </div>
            </header>
          </div>
        </LeagueContext.Provider>
      </WeekContext.Provider>
    </SeasonContext.Provider>
  );
}

export default AppContainer;
