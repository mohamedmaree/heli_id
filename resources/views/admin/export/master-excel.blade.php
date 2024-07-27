

    @if(!empty($records))
            <table class="table m-b-xs">
                <tbody>
                <tr style="background-color: #337ab7;color: #FFF;">
                    @foreach($cols as $col)
                        <th style="text-align: center;background-color: #0a6ebd;color: #ffffff;">{{$col}}</th>
                    @endforeach
                </tr>
                @if(!empty($records))

                    @foreach($records as $record)
                        <tr>
                            @foreach($values as $val)
                            @if (Str::contains($val, '.') )
                                    @php
                                        $implodedArray = explode( '.' , $val ) ; 
                                    @endphp
                                    <td style="text-align: center">{{$record[$implodedArray[0]][$implodedArray[1]] }}</td>
                                @else
                                    <td style="text-align: center">{{$record->$val}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align: center" colspan="5">لا يوجد نتائج</td>
                    </tr>
                @endif

                </tbody>
            </table>
    @endif

