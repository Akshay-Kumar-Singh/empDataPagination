import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { InputdataComponent } from './inputdata.component';

describe('InputdataComponent', () => {
  let component: InputdataComponent;
  let fixture: ComponentFixture<InputdataComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InputdataComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(InputdataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
