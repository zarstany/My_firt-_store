<?php
namespace App\UseCases;
class CalculateTotalAmountUseCases{
 Private const IVA_PORCENTAGE = 0.19;
 private int $totalWithOutIVA = 0;
 private int $TotalWithIVA = 0;
 private int $iva = 0;
 public function __construct(int $subtotal, int $deliveryAmount)
  {
   $this->totalWithOutIVA = $subtotal + $deliveryAmount;
   $this->iva = $this->totalWithOutIVA * self::IVA_PORCENTAGE;
   $this->TotalWithIVA = $this->totalWithOutIVA + $this->iva;
 }
 public function getTotal() : int{
  return $this->totalWithOutIVA;
 }
 public function Getiva(): int{
    return $this->iva;
 }
}