import React, { FC, useEffect, useState } from 'react';
import { axiosInst } from '../api/Request';
import { useWeekContext } from '../contexts/WeekContext';
import { useSeasonContext } from '../contexts/SeasonContext';


interface IProps {
}
const ListSeasons: FC<IProps> = (props) => {
  const { seasons, setSeasons, activeSeason, setActiveSeason } = useSeasonContext();
  const { setWeekCount } = useWeekContext();


  useEffect(() => {
    const fetchSeasonsData = async () => {
      await axiosInst.get('/season')
        .then(res => {
          setSeasons(res.data.data);
        })
    }

    fetchSeasonsData();
  }, []);

  useEffect(() => {
    const season = seasons.find(item => item.id === activeSeason);

    setWeekCount(season?.weeks || 0);
  }, [activeSeason, seasons]);


  const handleCreateNewSeason = () => {
    axiosInst.post('/season')
      .then(res => {
        setSeasons((seasons) => [...seasons, res.data.data]);
      })
  }


  const handleSeasonChange = (e: any) => {
    setActiveSeason(parseInt(e.target.value))
  }

  const selectionsContainer = seasons.map(item => {
    return (
      <option value={item.id}>
        {item.name}
      </option>
    )
  })
  return (
    <div>
      <select value={activeSeason} onChange={handleSeasonChange}>
        <option value="">Please select season</option>
        {selectionsContainer}
      </select>
      <button onClick={handleCreateNewSeason}>Create new season</button>
    </div>
  );
}

export default ListSeasons;
