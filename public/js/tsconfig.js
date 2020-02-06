import { FormControl, Validators, FormBuilder } from '@angular/forms';
import { Component } from '@angular/core';

@Component({
  selector: 'error-success-message',
  templateUrl: './error-success-message.component.html',
  styleUrls: ['./error-success-message.component.scss'],
})
export class ErrorSuccessMessageComponent {
  validationForm: FormGroup;

  constructor(public fb: FormBuilder) {
    this.validationForm = fb.group({
      emailFormEx: [null, [Validators.required, Validators.email]],
      passwordFormEx: [null, Validators.required],
    });
  }

  get emailFormEx() { return this.validationForm.get('emailFormEx'); }
  get passwordFormEx() { return this.validationForm.get('passwordFormEx'); }
}
