import React from "react";
import styled from "styled-components";

const StyledRadiusNone = styled.div`
  width: 200px;
  height: 100px;
  left: 20px;
  top: 20px;
  position: absolute;
  background: white;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.15);
`;

const StyledRadiusSmall = styled.div`
  width: 200px;
  height: 100px;
  left: 20px;
  top: 140px;
  position: absolute;
  background: white;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.15);
  border-radius: 4px;
`;

const StyledRadiusMedium = styled.div`
  width: 200px;
  height: 100px;
  left: 20px;
  top: 260px;
  position: absolute;
  background: white;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.15);
  border-radius: 8px;
`;

const StyledRadiusLarge = styled.div`
  width: 200px;
  height: 100px;
  left: 20px;
  top: 380px;
  position: absolute;
  background: white;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.15);
  border-radius: 12px;
`;

const StyledRadiusRound = styled.div`
  width: 200px;
  height: 100px;
  left: 20px;
  top: 500px;
  position: absolute;
  background: white;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.15);
  border-radius: 999px;
`;

const StyledRadius = styled.div`
  width: 240px;
  height: 620px;
  position: relative;
  overflow: hidden;
  border-radius: 5px;
  border: 1px #9747FF solid;
`;

export const Radius = () => {
  return (
    <StyledRadius>
      <StyledRadiusNone />
      <StyledRadiusSmall />
      <StyledRadiusMedium />
      <StyledRadiusLarge />
      <StyledRadiusRound />
    </StyledRadius>
  );
};