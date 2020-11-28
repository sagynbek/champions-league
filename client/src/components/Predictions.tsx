import React, { FC, useEffect, useState } from 'react';
import { axiosInst } from '../api/Request';
import { useWeekContext } from '../contexts/WeekContext';
import { useSeasonContext } from '../contexts/SeasonContext';
import { IPrediction } from '../types/types';

interface IProps {
}
const Predictions: FC<IProps> = (props) => {
  const [results, setResults] = useState<IPrediction[]>([]);
  const { activeSeason } = useSeasonContext();
  const { activeWeek, weeks } = useWeekContext();
  const minWeek = weeks.length > 0 ? weeks[0].id : 0;

  useEffect(() => {
    if (activeSeason) {
      axiosInst.get(`/prediction/${activeSeason}`)
        .then(res => {
          setResults(res.data.data);
        })
    }
    else {
      setResults([]);
    }
  }, [activeSeason]);


  if (!activeSeason || !activeWeek) {
    return null;
  }

  const predictionContainer = results.map(prediction => {
    return (
      <tr>
        <td>{prediction.team.name}</td>
        <td>{prediction.percent}%</td>
      </tr>
    )
  })
  return (
    <table>
      <thead>
        <tr>#{activeWeek - minWeek + 1} Week Prediction of Championship</tr>
      </thead>
      <tbody>
        {predictionContainer}
      </tbody>
    </table>
  );
}

export default Predictions;
