import { Controller } from '@hotwired/stimulus';
import jQuery from 'jquery';
import 'kendo-ui-core';

class KendoDropDownList extends Controller {
    static values = {
        remoteUrl: String,
        valueField: String,
        labelField: String,
    };
    static targets = ["input"]
    connect() {
        const el = this.inputTarget;
        jQuery(el).kendoDropDownList({
            filter: "contains",
            dataTextField: this.labelFieldValue,
            dataValueField: this.valueFieldValue,
            select: this.onInputChange,
            dataSource: {
                serverFiltering: true,
                transport: {
                    read: {
                        url: this.remoteUrlValue,
                        dataType: "json"
                    },
                    parameterMap: (d,t)=>{
                        const filter = d?.filter?.filters ?? false;
                        if (filter && filter.length > 0) {
                            return {
                                [this.labelFieldValue]: filter[0].value
                            }
                        } else {
                            return {};
                        }
                        return d;
                    }
                }
            }
        });
    }
    onInputChange = (event) => {
        console.log('onInputChange');
        console.log(event);
        const di = event.dataItem;
        console.log(di);
        this.inputTarget.value = di[this.valueFieldValue];

    }
}

export { KendoDropDownList as default };
