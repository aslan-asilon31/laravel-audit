<?php

namespace App\Livewire\TicketForm\Forms;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class TicketForm extends Form
{
  public string|null $title = null;
  public int|null $assign_to = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $status = null;



  public function rules(string|null $id = null): array
  {
    return [
      'masterForm.title' => 'required|string',
      'masterForm.assign_to' => 'nullable|integer',
      'masterForm.ticket_type' => 'required|string',
      'masterForm.tiket_prioritas' => 'required|string',
      'masterForm.ticket_assigning' => 'required|string',
      'masterForm.forward_to' => 'required|string',
      'masterForm.attachment' => 'required|string',
      'masterForm.opened_at' => 'required|string',
      'masterForm.resolved_at' => 'required|string',
      'masterForm.description' => 'required|string',
      'masterForm.status' => 'required|string',
      'masterForm.created_by' => 'required|string',
      'masterForm.updated_by' => 'required|string',
      'masterForm.created_at' => 'required|string',
      'masterForm.updated_at' => 'required|string',
    ];
  }

  public function attributes(): array
  {
    return [
      'masterForm.title' => 'title',
      'masterForm.assign_to' => 'Assign To',
      'masterForm.ticket_type' => 'Ticket Type',
      'masterForm.tiket_prioritas' => 'Ticket Priority',
      'masterForm.ticket_assigning' => 'Ticket Assigning',
      'masterForm.forward_to' => 'Forward To',
      'masterForm.attachment' => 'Attachment',
      'masterForm.opened_at' => 'Opened At',
      'masterForm.resolved_at' => 'Resolved At',
      'masterForm.description' => 'Description',
      'masterForm.status' => 'Status',
      'masterForm.created_by' => 'Diupdate Oleh',
      'masterForm.updated_by' => 'Diupdate Oleh',
      'masterForm.created_at' => 'Diupdate Oleh',
      'masterForm.updated_at' => 'Diupdate Oleh',
    ];
  }
}
