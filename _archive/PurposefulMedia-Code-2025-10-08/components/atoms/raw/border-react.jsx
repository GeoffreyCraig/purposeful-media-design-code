import React from "react";
import styled from "styled-components";

const StyledBorder = styled.div`
  width: 140px;
  height: 340px;
  position: relative;
  overflow: hidden;
  border-radius: 5px;
  border: 1px #9747FF solid;
`;

// Note: Vector content not exported - this component likely shows border width examples

export const Border = () => {
  return (
    <StyledBorder />
  );
};